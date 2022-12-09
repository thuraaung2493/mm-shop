<?php

namespace App\Services;

use App\DataTransferObjects\CategoryData;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryService
{
    public function getResources()
    {
        return CategoryResource::collection($this->getPaginate());
    }

    public function getAll(array $orders = [])
    {
        return Category::with('subcategories')
            ->when(count($orders), function ($q) use ($orders) {
                foreach ($orders as $col => $dir) {
                    $q->orderBy($col, $dir);
                }
            })->get();
    }

    public function getPaginate(?int $perPage = null)
    {
        return Category::with('subcategories')->paginate($perPage);
    }

    public function getResource(int $id)
    {
        return CategoryResource::make(
            Category::with('subcategories')->findOrFail($id)
        );
    }

    public function upsert(Category $category, CategoryData $categoryData): Category
    {
        $category->name = $categoryData->name;
        $category->save();

        return $category;
    }

    public function delete(Category $category): void
    {
        $category->delete();
    }
}
