<?php

namespace App\Http\Controllers\Api;

use App\DataTransferObjects\OrdersData;
use App\Http\Requests\StoreOrderRequest;
use App\Services\OrderService;
use Illuminate\Http\Response;

class OrderApiController extends ApiController
{
    public function __construct(private OrderService $orderService)
    {
    }

    public function store(StoreOrderRequest $request)
    {
        $data = OrdersData::fromRequest($request);

        return $this->responseOk(
            $this->orderService->makeOrder($data),
            Response::HTTP_CREATED,
        );
    }
}
