<?php

declare(strict_types=1);

namespace App\Domain\Lead\Specifications;

use App\Domain\Shared\Enums\RoleEnum;
use App\Domain\Lead\Enums\LeadStatusEnum;

class CanChangeLeadStatusSpecification
{
    public function __construct(
        private readonly RoleEnum $role,
        private readonly LeadStatusEnum $currentStatus,
        private readonly LeadStatusEnum $targetStatus
    ) {}

    public function isSatisfiedBy(): bool
    {
        $isTransitionValid = (new IsStatusTransitionAllowedSpecification(
            $this->currentStatus,
            $this->targetStatus
        ))->isSatisfiedBy();

        $isRoleAllowed = (new CanChangeStatusToSpecification(
            $this->role,
            $this->targetStatus
        ))->isSatisfiedBy();

        return $isTransitionValid && $isRoleAllowed;
    }
}
