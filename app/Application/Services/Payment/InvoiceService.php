<?php

namespace App\Application\Services\Payment;

use App\Domain\Payment\Aggregate\Invoice;
use App\Domain\Payment\Contracts\Repository\ClientRepositoryInterface;
use App\Domain\Payment\Contracts\Repository\InvoiceRepositoryInterface;
use App\Domain\Payment\Contracts\Service\InvoiceServiceInterface;
use App\Domain\Payment\ValueObjects\NewStatus;
use App\Domain\Payment\ValueObjects\RejectedStatus;

class InvoiceService implements InvoiceServiceInterface
{
    public function __construct(
        private ClientRepositoryInterface $clientRepository,
        private InvoiceRepositoryInterface $invoiceRepository
    ) {}

    public function create(int $clientId)
    {
        $client = $this->clientRepository->findById($clientId);
        $invoice = new Invoice(1, $client);
        $invoice->setStatus(new NewStatus());
        $this->invoiceRepository->create($invoice);
        return $invoice->getId();
    }
    public function addLineItem(int $id, int $itemId, int|float $quantity) {}

    public function reject(int $invoiceId)
    {
        $invoice = $this->invoiceRepository->findById($invoiceId);
        $invoice->setStatus(new RejectedStatus());
        $this->invoiceRepository->update($invoice);
    }
    public function process(int $id) {}
}
