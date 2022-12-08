<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'number' => $this->number,
            'user' => UserResource::make($this->customer),
            'total_price' => $this->total_price,
            'total_quantity' => $this->total_quantity,
            'status' => $this->status,
            'items' => $this->getOrderItems(),
        ];
    }

    private function getOrderItems(): Collection
    {
        return $this->items->map(function ($item) {
            return [
                'name' => $item->name,
                'price' => $item->price,
                'total_quantity' => $item->orderItem->total_quantity,
                'status' => $item->status,
            ];
        });
    }
}
