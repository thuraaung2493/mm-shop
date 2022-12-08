<?php

namespace App\DataTransferObjects;

use App\Models\Item;
use App\ValueObjects\Price;

class OrderItem
{
    public function __construct(
        public readonly Item $item,
        public readonly int $quantity,
        public readonly Price $price,
    ) {
    }
}
