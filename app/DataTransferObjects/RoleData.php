<?php

namespace App\DataTransferObjects;

use App\Http\Requests\UpsertRoleRequest;

class RoleData extends Data
{
    public function __construct(
        public readonly String $name,
        public readonly array $permissions,
    ) {
    }

    public static function fromRequest(UpsertRoleRequest $request): self
    {
        return new static(
            $request->name,
            $request->permissions
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
