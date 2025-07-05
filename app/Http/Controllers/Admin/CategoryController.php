<?php


namespace App\Controllers\Admin;

use App\DTO\Admin\Category\CreateCategoryDTO;
use App\Services\Admin\CategoryService;
use Illuminate\Support\Facades\Request;

class CategoryController
{

    public function __construct(private CategoryService $service) {}

    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'is_active' => 'boolean',
            'supplier_id' => 'nullable|integer',
        ]);

        $dto = new CreateCategoryDTO(
            name: $validated['name'],
            price: $validated['price'],
            is_active: $validated['is_active'] ?? true,
            supplier_id: $validated['supplier_id'] ?? null
        );

        $this->service->storeCategory($dto);
    }
}
