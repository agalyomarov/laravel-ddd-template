<?php

namespace App\Domain\Lead\Repositories;

use App\Domain\Lead\Entities\Lead;

interface ClientRepositoryInterface
{
    public function findById(int $id): Lead;
    public function create();
    public function update(Lead $lead);
}
