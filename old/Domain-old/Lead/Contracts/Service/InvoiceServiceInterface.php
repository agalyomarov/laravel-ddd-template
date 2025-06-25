<?php

namespace App\Domain\Payment\Contracts\Service;

interface InvoiceServiceInterface
{
    public function create(int $clientId);
    public function addLineItem(int $id, int $itemId, int|float $quantity);
    public function reject(int $id);
    public function process(int $id);
}
