<?php

namespace App\Http\Controllers\Api;

use App\Services\SubcategoryService;

class SubcategoryApiController extends ApiController
{
    public function __construct(private SubcategoryService $subcategoryService)
    {
    }

    public function index()
    {
        return $this->responseOk(
            $this->subcategoryService->getAll()
        );
    }

    public function show(int $id)
    {
        return $this->responseOk(
            $this->subcategoryService->getById($id)
        );
    }
}
