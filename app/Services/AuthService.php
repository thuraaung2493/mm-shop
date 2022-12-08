<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\AuthResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            ...$request->validated(),
            'password' => Hash::make($request->password)
        ]);

        return UserResource::make($user);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        $this->check($user, $request);

        $this->revokeOldTokens($user);

        $token = $user->createToken($user->email, expiresAt: now()->addDays(7));

        return AuthResource::make(['user' => $user, 'newAccessToken' => $token]);
    }

    private function check(User $user, LoginRequest $request)
    {
        if (!$user || !Hash::check($request->password, $user->password)) {
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
