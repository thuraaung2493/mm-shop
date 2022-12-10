<?php

namespace App\DataTransferObjects;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Item;
use App\ValueObjects\Price;
use Illuminate\Support\Collection;

class OrdersData extends Data
{
    public function __construct(public readonly Collection $orderItems)
    {
    }

    public static function fromRequest(StoreOrderRequest $request): self
    {
        $orders = collect($request->validated('order_items'));

        $itemIds = $orders->map(fn ($order) => $order['id']);

        $items = Item::whereIn('id', $itemIds)->get();

        $orderItems = static::getOrderItems($orders, $items);

        return new static($orderItems);
    }

    private static function getOrderItems(Collection $orders, Collection $items): Collection
    {
        return $orders->map(function ($order) use ($items) {
            $item = $items->find($order['id']);
            $quantity = $order['quantity'];

            return new OrderItem(
                $item,
                $quantity,
                Price::from($item->price->value() * $quantity)
            );
        });
    }

    public function toArray(): array
    {
        return [
            'order_items' => $this->orderItems,
        ];
    }
}
