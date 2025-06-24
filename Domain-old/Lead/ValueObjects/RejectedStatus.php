<?php

namespace App\Domain\Payment\ValueObjects;

class RejectedStatus extends Status
{
    protected $next = [];
}
