<?php

namespace App\DataTransferObjects;

use App\Http\Requests\LoginRequest;

class LoginData
{
    public function __construct(
        public readonly String $email,
        public readonly String $password,
    ) {
    }

    public static function fromRequest(LoginRequest $request): self
    {
        return new self(
            $request->email,
            $request->password,
        );
    }

    public function toArray()
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
