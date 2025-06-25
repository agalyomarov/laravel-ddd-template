<?php

namespace App\Domain\Payment\Events;

use App\Domain\Payment\Aggregate\Invoice;

class InvoiceStatusWasChangedEvent
{
    public function __construct(
        public Invoice $invoice
    ) {}
}
