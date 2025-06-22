<?php

namespace App\Domain\Payment\Contracts\Repository;

use App\Domain\Payment\Aggregate\Invoice;

interface InvoiceRepositoryInterface
{
    public function findById(int $id);
    public function create(Invoice $invoice);
    public function update(Invoice $invoice);
}
