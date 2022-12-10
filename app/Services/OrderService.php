<?php

namespace App\Services;

use App\DataTransferObjects\OrdersData;
use App\Enums\OrderStatus;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class OrderService
{
    public function makeOrder(OrdersData $ordersData): JsonResource
    {
        $orderItems = $ordersData->orderItems;

        $order = $this->createOrder([
            'total_price' => $orderItems->sum(fn ($item) => $item->price->value()),
            'total_quantity' => $orderItems->sum('quantity'),
        ]);

        $this->createOrderItems($order, $orderItems);

        return OrderResource::make($order);
    }

    public function createOrder(array $data): Order
    {
        return Order::create([
            'number' => Str::uuid(),
            'user_id' => request()->user()->id,
            'total_price' => $data['total_price'],
            'total_quantity' => $data['total_quantity'],
            'status' => OrderStatus::PENDING,
        ]);
    }

    public function createOrderItems(Order $order, Collection $orderItems): void
    {
        $orderItems->each(
            fn ($orderItem) =>
            $order->items()->attach($orderItem->item, [
                'total_price' => $orderItem->price->value(),
                'total_quantity' => $orderItem->quantity,
            ])
        );
    }
}
