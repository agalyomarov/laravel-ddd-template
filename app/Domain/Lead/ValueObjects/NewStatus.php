<?php

namespace App\Domain\Payment\ValueObjects;

class NewStatus extends Status
{
    protected $next = [ProcessingStatus::class, RejectedStatus::class];
}
