<?php

declare(strict_types=1);

namespace App\Domain\Lead\Specifications;

use App\Domain\Lead\Aggregate\Lead;
use App\Domain\Lead\Enums\LeadStatusEnum;
use App\Domain\Shared\Enums\RoleEnum;

class IsLeadReadableByRoleSpecification
{
    public function __construct(
        private readonly RoleEnum $role,
        private readonly Lead $lead
    ) {}

    public function isSatisfiedBy(): bool
    {
        return match ($this->role) {
            RoleEnum::OPERATOR => $this->isReadableByOperator(),
            RoleEnum::MANAGER => $this->isReadableByManager(),
            RoleEnum::CREDIT_DEPARTMENT => $this->isReadableByCreditDepartment(),
            default => false,
        };
    }

    private function isReadableByOperator(): bool
    {
        return in_array($this->lead->getStatus(), [
            LeadStatusEnum::NEW,
            LeadStatusEnum::PROCESSING,
        ]);
    }

    private function isReadableByManager(): bool
    {
        return in_array($this->lead->getStatus(), [
            LeadStatusEnum::PROCESSING,
            LeadStatusEnum::APPROVED,
            LeadStatusEnum::REJECTED,
        ]);
    }

    private function isReadableByCreditDepartment(): bool
    {
        return in_array($this->lead->getStatus(), [
            LeadStatusEnum::APPROVED,
            LeadStatusEnum::REJECTED,
        ]);
    }
}
