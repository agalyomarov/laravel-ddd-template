<?php

namespace App\Domain\Contracts\Repositories\Models;

interface CategoryRepositoryInterface
{
    public function getAll();
    public function create(array $data);
}
