<?php

namespace App\Services;

use App\DataTransferObjects\SubcategoryData;
use App\Http\Resources\SubcategoryResource;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class SubcategoryService
{
    public function getResources(): JsonResource
    {
        return SubcategoryResource::collection(
            $this->getPaginate()
        );
    }

    public function getResource(int $id): JsonResource
    {
        return SubcategoryResource::make(
            Subcategory::with('category')->findOrFail($id)
        );
    }

    public function getAll(array $orders = []): Collection
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

    public function getCount(): int
    {
        return Subcategory::count();
    }

    public function upsert(
        Subcategory $subcategory,
        SubcategoryData $subcategoryData,
    ): Subcategory {
        $subcategory->fill($subcategoryData->toArray())->save();

        return $subcategory;
    }

    public function delete(Subcategory $subcategory): void
    {
        $subcategory->delete();
    }
}
