<?php

namespace App\DataTransferObjects;

class CategoryData extends Data
{
    public function __construct(
        public readonly String $name
    ) {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
