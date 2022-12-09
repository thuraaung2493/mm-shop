<?php

namespace App\Services;

use App\DataTransferObjects\SubcategoryData;
use App\Http\Resources\SubcategoryResource;
use App\Models\Subcategory;

class SubcategoryService
{
    public function getResources()
    {
        return SubcategoryResource::collection(
            $this->getPaginate()
        );
    }

    public function getAll(array $orders = [])
    {
        return Subcategory::with('category', 'items')
            ->when(count($orders), function ($q) use ($orders) {
                foreach ($orders as $col => $dir) {
                    $q->orderBy($col, $dir);
                }
            })->get();
    }

    public function getPaginate(?int $perPage = null)
    {
        return Subcategory::with('category', 'items')->paginate($perPage);
    }

    public function getResource(int $id)
    {
        return SubcategoryResource::make(
            Subcategory::with('category')->findOrFail($id)
        );
    }

    public function upsert(
        Subcategory $subcategory,
        SubcategoryData $subcategoryData,
    ): Subcategory {
        $subcategory->name = $subcategoryData->name;
        $subcategory->category_id = $subcategoryData->category->id;
        $subcategory->save();

        return $subcategory;
    }

    public function delete(Subcategory $subcategory): void
    {
        $subcategory->delete();
    }
}
