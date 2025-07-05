<?php

namespace App\Repositories\Eloquent\Repositories;

use App\Repositories\Eloquent\Models\EloquentCategory;

class EloquentCategoryRepository
{
    public function all()
    {
        return EloquentCategory::all();
    }
}
