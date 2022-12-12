<?php

namespace App\Services;

use App\DataTransferObjects\LoginData;
use App\DataTransferObjects\UserData;
use App\Http\Resources\AuthResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;

class AuthService
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function register(UserData $userData): JsonResource
    {
        return UserResource::make(
            $this->userService->create($userData)
        );
    }

    public function login(LoginData $loginData): JsonResource
    {
        $user = $this->userService->find(['email', $loginData->email]);

        $this->check($user, $loginData);

        $this->revokeOldTokens($user);

        $token = $user->createToken($user->email, expiresAt: now()->addDays(7));

        return AuthResource::make(['user' => $user, 'newAccessToken' => $token]);
    }

    private function check(User $user, LoginData $loginData): void
    {
        if (!$user || !Hash::check($loginData->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
    }

    private function revokeOldTokens(User $user): void
    {
        $user->tokens()->update(['expires_at' => now()->subHour()]);
    }

    public static function auth(): void
    {
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();
            if (static::checkAuth($user, $request)) {
                return $user;
            }
        });
    }

    private static function checkAuth(?User $user, Request $request): bool
    {
        return  $user && !$user->is_customer &&
            Hash::check($request->password, $user->password);
    }
}
