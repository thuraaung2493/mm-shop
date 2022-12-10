<?php

namespace App\DataTransferObjects;

use App\Http\Requests\UpsertPermissionRequest;

class PermissionData extends Data
{
    public function __construct(
        public readonly String $name,
    ) {
    }

    public static function fromRequest(UpsertPermissionRequest $request): self
    {
        return new static(
            $request->name
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
