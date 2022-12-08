<?php

namespace App\Services;

use App\Http\Resources\SubcategoryResource;
use App\Models\Subcategory;

class SubcategoryService
{
    public function getAll()
    {
        return SubcategoryResource::collection(
            Subcategory::with('category')->paginate()
        );
    }

    public function getById(int $id)
    {
        return SubcategoryResource::make(
            Subcategory::with('category')->findOrFail($id)
        );
    }
}
