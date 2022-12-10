<?php

namespace App\DataTransferObjects;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserData extends Data
{
    public function __construct(
        public readonly String $name,
        public readonly String $email,
        private String $password,
        public readonly ?Carbon $activatedAt,
        public readonly bool $isCustomer,
        public readonly array $roles,
    ) {
    }

    public static function fromRequest(Request $request): self
    {
        return new self(
            $request->name,
            $request->email,
            $request->password,
            $request->has('is_activated') ? now() : null,
            $request->has('is_customer'),
            $request->roles ?? [],
        );
    }

    public function getHashPassword(): String
    {
        return Hash::make($this->password);
    }

    public function setPassword(String $newPassword): self
    {
        $this->password = $newPassword;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'activated_at' => $this->activatedAt,
            'is_customer' => $this->isCustomer,
        ];
    }
}
