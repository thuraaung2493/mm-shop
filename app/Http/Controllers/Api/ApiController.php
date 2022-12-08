<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    protected function errorResponse(
        ?String $errMsg,
        int $status = Response::HTTP_INTERNAL_SERVER_ERROR,
    ) {
        return response()->json([
            'error' => $errMsg ?? 'Something went wrong!',
            'message' => 'failed',
            'status' => $status,
        ], $status);
    }

    protected function responseOk(
        JsonResource $jsonResource,
        int $status = Response::HTTP_OK,
    ) {
        return $jsonResource->additional([
            'message' => 'success',
            'status' => $status,
        ]);
    }
}
