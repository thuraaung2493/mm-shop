<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Response;

class AuthApiController extends ApiController
{
    public function __construct(private AuthService $authService)
    {
    }

    public function register(RegisterRequest $request)
    {
        return $this->responseOk(
            $this->authService->register($request),
            Response::HTTP_CREATED,
        );
    }

    public function login(LoginRequest $request)
    {
        return $this->responseOk(
            $this->authService->login($request),
        );
    }
}
