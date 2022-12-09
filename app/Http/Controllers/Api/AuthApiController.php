<?php

namespace App\Http\Controllers\Api;

use App\DataTransferObjects\LoginData;
use App\DataTransferObjects\UserData;
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
        $userData = UserData::fromRequest($request->merge(['is_customer' => true]));

        return $this->responseOk(
            $this->authService->register($userData),
            Response::HTTP_CREATED,
        );
    }

    public function login(LoginRequest $request)
    {
        $userData = LoginData::fromRequest($request);

        return $this->responseOk(
            $this->authService->login($userData),
        );
    }
}
