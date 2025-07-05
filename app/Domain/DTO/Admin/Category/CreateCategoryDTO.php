<?php

namespace App\Domain\DTO\Admin\Category;

readonly class CreateCategoryDTO
{
    public function __construct(
        public string $name,
        public float $price,
        public bool $is_active,
        public ?int $supplier_id,
    ) {}
}
