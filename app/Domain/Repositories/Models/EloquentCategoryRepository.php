<?php

namespace App\Domain\Repositories\Models;

use App\Domain\Contracts\Repositories\Models\CategoryRepositoryInterface;

class EloquentCategoryRepository implements CategoryRepositoryInterface
{
    public function getAll() {}
    public function create(array $data) {}
}
