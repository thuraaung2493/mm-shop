<?php

namespace App\Services;

use App\DataTransferObjects\LoginData;
use App\DataTransferObjects\UserData;
use App\Http\Resources\AuthResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function register(UserData $userData)
    {
        return UserResource::make(
            $this->userService->create($userData)
        );
    }

    public function login(LoginData $loginData)
    {
        $user = $this->userService->find(['email', $loginData->email]);

        $this->check($user, $loginData);

        $this->revokeOldTokens($user);

        $token = $user->createToken($user->email, expiresAt: now()->addDays(7));

        return AuthResource::make(['user' => $user, 'newAccessToken' => $token]);
    }

    private function check(User $user, LoginData $loginData)
    {
        if (!$user || !Hash::check($loginData->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
    }

    private function revokeOldTokens(User $user)
    {
        $user->tokens()->update(['expires_at' => now()->subHour()]);
    }
}
