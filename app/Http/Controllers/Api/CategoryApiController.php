<?php

namespace App\Http\Controllers\Api;

use App\Services\CategoryService;

class CategoryApiController extends ApiController
{
    public function __construct(private CategoryService $categoryService)
    {
    }

    public function index()
    {
        return $this->responseOk(
            $this->categoryService->getResources()
        );
    }

    public function show(int $id)
    {
        return $this->responseOk(
            $this->categoryService->getResource($id)
        );
    }
}
