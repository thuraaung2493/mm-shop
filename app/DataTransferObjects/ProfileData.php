<?php

namespace App\DataTransferObjects;

use App\Http\Requests\UpsertUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class ProfileData extends Data
{
    public function __construct(
        public readonly String $name,
        public readonly String $email,
        public readonly array $roles,
    ) {
    }

    public static function fromRequest(UpsertUserRequest $request): self
    {
        return new self(
            $request->name,
            $request->email,
            $request->roles ?? [],
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
