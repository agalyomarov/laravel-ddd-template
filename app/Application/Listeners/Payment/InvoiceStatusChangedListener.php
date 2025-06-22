<?php

namespace App\Application\Listeners\Payment;

use App\Domain\Payment\Events\InvoiceStatusWasChangedEvent;

class InvoiceStatusChangedListener
{
    public function handle(InvoiceStatusWasChangedEvent $event)
    {

        $invoice = $event->invoice;
    }
}
