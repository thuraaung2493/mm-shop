<?php

namespace App\Services;

use App\DataTransferObjects\ItemData;
use App\Enums\ItemStatus;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemService
{
    public function getAll(): Collection
    {
        return Item::with('subcategory', 'subcategory.category')->get();
    }

    public function getPaginate(?int $perPage = null)
    {
        return Item::with('subcategory', 'subcategory.category')->paginate($perPage);
    }

    public function getResources(): JsonResource
    {
        return ItemResource::collection(
            $this->getPaginate()
        );
    }

    public function getResource(int $id)
    {
        return ItemResource::make(
            Item::with('subcategory', 'subcategory.category')->findOrFail($id)
        );
    }

    public function getCount(): int
    {
        return Item::count();
    }

    public function upsert(Item $item, ItemData $itemData): Item
    {
        $item->fill($itemData->toArray())->save();

        return $item;
    }

    public function delete(Item $item): void
    {
        $item->delete();
    }

    public function getStatuses(): array
    {
        return ItemStatus::values();
    }
}
