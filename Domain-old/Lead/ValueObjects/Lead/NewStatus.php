<?php

namespace App\Domain\Lead\ValueObjects\Lead;

class NewStatus extends Status
{
    protected $next = [ProcessingStatus::class];
}
