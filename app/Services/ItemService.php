<?php

namespace App\Services;

use App\DataTransferObjects\ItemData;
use App\Enums\ItemStatus;
use App\Http\Resources\ItemResource;
use App\Models\Item;

class ItemService
{
    public function getResources()
    {
        return ItemResource::collection(
            $this->getAll()
        );
    }

    public function getAll()
    {
        return Item::with('subcategory', 'subcategory.category')->paginate();
    }

    public function getResource(int $id)
    {
        return ItemResource::make(
            Item::with('subcategory', 'subcategory.category')->findOrFail($id)
        );
    }

    public function upsert(Item $item, ItemData $itemData): Item
    {
        $item->name = $itemData->name;
        $item->price = $itemData->price->value();
        $item->quantity = $itemData->quantity;
        $item->status = $itemData->status;
        $item->subcategory_id = $itemData->subcategory->id;
        $item->save();

        return $item;
    }

    public function delete(Item $item)
    {
        $item->delete();
    }

    public function getStatuses()
    {
        return ItemStatus::values();
    }
}
