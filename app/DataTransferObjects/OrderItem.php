<?php

namespace App\DataTransferObjects;

use App\Models\Item;
use App\ValueObjects\Price;

class OrderItem extends Data
{
    public function __construct(
        public readonly Item $item,
        public readonly int $quantity,
        public readonly Price $price,
    ) {
    }

    public function toArray(): array
    {
        return [
            'item' => $this->item,
            'quantity' => $this->quantity,
            'price' => $this->price->value(),
        ];
    }
}
