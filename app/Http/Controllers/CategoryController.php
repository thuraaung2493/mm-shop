<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\CategoryData;
use App\Http\Requests\UpsertCategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;

class CategoryController extends Controller
{

    public function __construct(private readonly CategoryService $categoryService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index', [
            'categories' => $this->categoryService->getPaginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UpsertCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpsertCategoryRequest $request)
    {
        $this->upsert($request, new Category());

        return redirect()->route('categories.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpsertCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpsertCategoryRequest $request, Category $category)
    {
        $this->upsert($request, $category);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->categoryService->delete($category);

        return redirect()->route('categories.index');
    }

    private function upsert(UpsertCategoryRequest $request, Category $category): Category
    {
        $categoryData = new CategoryData(...$request->validated());

        return $this->categoryService->upsert($category, $categoryData);
    }
}
