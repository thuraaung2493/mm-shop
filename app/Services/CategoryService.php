<?php

namespace App\Services;

use App\DataTransferObjects\CategoryData;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryService
{
    public function getResources(): JsonResource
    {
        return CategoryResource::collection($this->getPaginate(10));
    }

    public function getResource(int $id): JsonResource
    {
        return CategoryResource::make(
            Category::with('subcategories')->findOrFail($id)
        );
    }

    public function getAll(array $orders = []): Collection
    {
        return Category::with('subcategories')
            ->when(count($orders), function ($q) use ($orders) {
                foreach ($orders as $col => $dir) {
                    $q->orderBy($col, $dir);
                }
            })->get();
    }

    public function getPaginate(?int $perPage = null): Paginator
    {
        return Category::with('subcategories')->paginate($perPage);
    }

    public function getCount(): int
    {
        return Category::count();
    }

    public function upsert(Category $category, CategoryData $categoryData): Category
    {
        $category->fill($categoryData->toArray())->save();

        return $category;
    }

    public function delete(Category $category): void
    {
        $category->delete();
    }
}
