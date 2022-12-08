<?php

namespace App\DataTransferObjects;

use App\Models\Item;
use App\ValueObjects\Price;
use Illuminate\Support\Collection;

class OrdersData
{
    public function __construct(public readonly Collection $orderItems)
    {
    }

    public static function of(array $orders): self
    {
        $itemIds = collect($orders)->map(fn ($order) => $order['id']);

        $items = Item::whereIn('id', $itemIds)->get();

        $orderItems = collect($orders)->map(function ($order) use ($items) {
            $item = $items->find($order['id']);
            $quantity = $order['quantity'];

            return new OrderItem(
                $item,
                $quantity,
                Price::from($item->price->value() * $quantity)
            );
        });

        return new static($orderItems);
    }
}
