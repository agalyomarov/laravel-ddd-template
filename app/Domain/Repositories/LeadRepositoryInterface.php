<?php

declare(strict_types=1);

namespace App\Domain\Lead\Repositories;

use App\Domain\Lead\Aggregate\Lead;
use App\Domain\Shared\Enums\RoleEnum;

interface LeadRepositoryInterface
{
    public function save(Lead $lead): void;
    public function findById(int $id): ?Lead;
    public function findAll(): iterable;
    public function delete(Lead $lead): void;
    /**
     * @return Lead[]
     */
    public function getReadableByRole(RoleEnum $role): array;
}
