<?php

namespace App\Services;

use App\Http\Resources\ItemResource;
use App\Models\Item;

class ItemService
{
    public function getAll()
    {
        return ItemResource::collection(
            Item::with('subcategory', 'subcategory.category')->paginate()
        );
    }

    public function getById(int $id)
    {
        return ItemResource::make(
            Item::with('subcategory', 'subcategory.category')->findOrFail($id)
        );
    }
}
