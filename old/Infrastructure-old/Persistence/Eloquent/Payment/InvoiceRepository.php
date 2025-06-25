<?php

namespace App\Infrastructure\Persistence\Eloquent\Payment;

use App\Domain\Payment\Aggregate\Invoice;
use App\Domain\Payment\Contracts\Repository\InvoiceRepositoryInterface;
use Illuminate\Support\Facades\DB;

class InvoiceRepository implements InvoiceRepositoryInterface
{
    public function findById(int $id)
    {
        return DB::table('invoices')
            ->where('id', $id)
            ->first();
    }
    public function create(Invoice $invoice)
    {
        DB::beginTransaction();

        try {
            $invoiceId = DB::table('invoices')->insertGetId([
                'client_id' => $invoice->getClient()->getId(),
                'status' => $invoice->getStatus(),
            ]);
            $invoice->setLineItems([]);
            foreach ($invoice->getLineItems() as $lineItem) {
                DB::table('invoice_lines')->insert([
                    'invoice_id' => $invoiceId,
                    'item_id' => $lineItem->getItem()->getId(),
                    'quantity' => $lineItem->getQuantity(),
                ]);
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(Invoice $invoice) {}
}
