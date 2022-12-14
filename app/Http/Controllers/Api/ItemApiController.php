<?php

namespace App\Http\Controllers\Api;

use App\Services\ItemService;

class ItemApiController extends ApiController
{
    public function __construct(private ItemService $itemService)
    {
    }

    public function index()
    {
        return $this->responseOk(
            $this->itemService->getResources()
        );
    }

    public function show(int $id)
    {
        return $this->responseOk(
            $this->itemService->getResource($id)
        );
    }
}
