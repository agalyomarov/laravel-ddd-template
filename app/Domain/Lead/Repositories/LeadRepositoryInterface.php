<?php

declare(strict_types=1);

namespace App\Domain\Lead\Repositories;

use App\Domain\Lead\Entities\Lead;

interface LeadRepositoryInterface
{
    public function save(Lead $lead): void;

    public function findById(int $id): Lead;

    public function delete(Lead $lead): void;
}
