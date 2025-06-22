<?php

namespace App\Domain\Payment\ValueObjects;

class ProcessingStatus extends Status
{
    protected $next = [];
}
