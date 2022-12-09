<?php

namespace App\DataTransferObjects;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class ProfileData
{
    public function __construct(
        public readonly String $name,
        public readonly String $email,
    ) {
    }

    public static function fromRequest(Request $request): self
    {
        return new self(
            $request->name,
            $request->email,
        );
    }

    public function has(String $name): bool
    {
        return $this->{$name} !== null;
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
