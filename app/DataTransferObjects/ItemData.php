<?php

namespace App\DataTransferObjects;

use App\Enums\ItemStatus;
use App\Http\Requests\UpsertItemRequest;
use App\Models\Subcategory;
use App\ValueObjects\Price;

class ItemData extends Data
{
    public function __construct(
        public readonly String $name,
        public readonly Price $price,
        public readonly int $quantity,
        public readonly ItemStatus $status,
        public readonly Subcategory $subcategory,
    ) {
    }

    public static function fromRequest(UpsertItemRequest $request): self
    {
        return new static(
            $request->name,
            Price::from($request->price),
            $request->quantity,
            ItemStatus::from($request->status),
            $request->getSubcategory(),
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'price' => $this->price->value(),
            'quantity' => $this->quantity,
            'status' => $this->status,
            'subcategory_id' => $this->subcategory->id,
        ];
    }
}
