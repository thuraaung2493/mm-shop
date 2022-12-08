<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $subcategory = SubcategoryResource::make($this->whenLoaded('subcategory'));

        $category = CategoryResource::make($subcategory->category);

        unset($subcategory->category);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'status' => $this->status,
            'category' => $category,
            'subcategory' => SubcategoryResource::make($this->whenLoaded('subcategory')),
            'created_date' => $this->created_at->toFormattedDateString(),
        ];
    }
}
