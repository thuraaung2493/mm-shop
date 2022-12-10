<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ItemService;
use App\Services\SubcategoryService;
use App\Services\UserService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        private readonly UserService $userService,
        private readonly CategoryService $categoryService,
        private readonly SubcategoryService $subcategoryService,
        private readonly ItemService $itemService,
    ) {
    }

    public function index()
    {
        return view('dashboard', [
            'usersCount' => $this->userService->getCount(),
            'categoriesCount' => $this->categoryService->getCount(),
            'subcategoriesCount' => $this->subcategoryService->getCount(),
            'itemsCount' => $this->itemService->getCount(),
        ]);
    }
}
