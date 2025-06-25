<?php

declare(strict_types=1);

namespace App\Domain\Lead\Specifications;

use App\Domain\Shared\Enums\RoleEnum;
use App\Domain\Lead\Enums\LeadStatusEnum;

class LeadVisibleForRoleSpecification
{
    public function __construct(private RoleEnum $role) {}

    /**
     * @return LeadStatusEnum[]
     */
    public function visibleStatuses(): array
    {
        return match ($this->role) {
            RoleEnum::OPERATOR => [LeadStatusEnum::NEW, LeadStatusEnum::PROCESSING],
            RoleEnum::MANAGER => [LeadStatusEnum::PROCESSING, LeadStatusEnum::APPROVED, LeadStatusEnum::REJECTED],
            RoleEnum::CREDIT_DEPARTMENT => [LeadStatusEnum::APPROVED, LeadStatusEnum::REJECTED],
            default => [],
        };
    }
}
