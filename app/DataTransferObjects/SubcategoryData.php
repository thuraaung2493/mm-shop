<?php

namespace App\DataTransferObjects;

use App\Http\Requests\UpsertSubcategoryRequest;
use App\Models\Category;

class SubcategoryData extends Data
{
    public function __construct(
        public readonly String $name,
        public readonly Category $category,
    ) {
    }

    public static function fromRequest(UpsertSubcategoryRequest $request): self
    {
        return new static(
            $request->name,
            $request->getCategory(),
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'category_id' => $this->category->id,
        ];
    }
}
