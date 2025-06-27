<?php

declare(strict_types=1);

namespace App\Domain\Lead\Specifications;

use App\Domain\Shared\Enums\RoleEnum;
use App\Domain\Lead\Enums\LeadStatusEnum;

class CanChangeStatusToSpecification
{
    public function __construct(
        private readonly RoleEnum $role,
        private readonly LeadStatusEnum $targetStatus
    ) {}

    public function isSatisfiedBy(): bool
    {
        $allowedStatuses = match ($this->role) {
            RoleEnum::OPERATOR => [LeadStatusEnum::PROCESSING],
            RoleEnum::MANAGER => [LeadStatusEnum::APPROVED, LeadStatusEnum::REJECTED],
            RoleEnum::CREDIT_DEPARTMENT => [LeadStatusEnum::APPROVED, LeadStatusEnum::REJECTED],
        };

        return in_array($this->targetStatus, $allowedStatuses);
    }
}
