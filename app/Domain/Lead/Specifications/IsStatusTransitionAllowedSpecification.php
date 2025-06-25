<?php

declare(strict_types=1);

namespace App\Domain\Lead\Specifications;

use App\Domain\Lead\Enums\LeadStatusEnum;

class IsStatusTransitionAllowedSpecification
{
    public function __construct(
        private readonly LeadStatusEnum $currentStatus,
        private readonly LeadStatusEnum $targetStatus
    ) {}

    public function isSatisfiedBy(): bool
    {
        return $this->currentStatus->canTransitionTo($this->targetStatus);
    }
}
