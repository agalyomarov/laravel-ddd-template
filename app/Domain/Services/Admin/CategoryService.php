<?php

namespace App\Domain\Services\Admin;

use App\Domain\Contracts\Repositories\Models\CategoryRepositoryInterface;
use App\Domain\DTO\Admin\Category\CreateCategoryDTO;

class CategoryService
{

    public function __construct(private CategoryRepositoryInterface $repo) {}

    public function storeCategory(CreateCategoryDTO $dto)
    {
        $this->repo->create([]);
    }
}
