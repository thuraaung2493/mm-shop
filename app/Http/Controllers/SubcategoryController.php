<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\SubcategoryData;
use App\Http\Requests\UpsertSubcategoryRequest;
use App\Models\Subcategory;
use App\Services\CategoryService;
use App\Services\SubcategoryService;

class SubcategoryController extends Controller
{
    public function __construct(
        private readonly SubcategoryService $subcategoryService,
        private readonly CategoryService $categoryService,
    ) {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subcategories.index', [
            'subcategories' => $this->subcategoryService->getPaginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subcategories.create', [
            'categories' => $this->categoryService->getAll(['name' => 'asc']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UpsertSubcategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpsertSubcategoryRequest $request)
    {
        $this->upsert($request, new Subcategory());

        return redirect()->route('subcategories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        return view('subcategories.edit', [
            'subcategory' => $subcategory,
            'categories' => $this->categoryService->getAll(['name' => 'asc']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpsertSubcategoryRequest  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpsertSubcategoryRequest $request, Subcategory $subcategory)
    {
        $this->upsert($request, $subcategory);

        return redirect()->route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $this->subcategoryService->delete($subcategory);

        return redirect()->route('subcategories.index');
    }

    private function upsert(
        UpsertSubcategoryRequest $request,
        Subcategory $subcategory,
    ): Subcategory {
        $subcategoryData = SubcategoryData::fromRequest($request);

        return $this->subcategoryService->upsert($subcategory, $subcategoryData);
    }
}
