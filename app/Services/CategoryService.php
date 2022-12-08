<?php

namespace App\Services;

use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryService
{
    public function getAll()
    {
        return CategoryResource::collection(
            Category::with('subcategories')->paginate()
        );
    }

    public function getById(int $id)
    {
        return CategoryResource::make(
            Category::with('subcategories')->findOrFail($id)
        );
    }
}
