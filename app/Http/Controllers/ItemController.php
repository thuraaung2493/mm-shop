<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\ItemData;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Requests\UpsertItemRequest;
use App\Models\Item;
use App\Services\ItemService;
use App\Services\SubcategoryService;

class ItemController extends Controller
{
    public function __construct(
        private readonly ItemService $itemService,
        private readonly SubcategoryService $subcategoryService,
    ) {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('items.index', [
            'items' => $this->itemService->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create', [
            'statuses' => $this->itemService->getStatuses(),
            'subcategories' => $this->subcategoryService->getAll(['name' => 'asc']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UpsertItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpsertItemRequest $request)
    {
        $this->upsert($request, new Item());

        return redirect()->route('items.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('items.edit', [
            'item' => $item,
            'statuses' => $this->itemService->getStatuses(),
            'subcategories' => $this->subcategoryService->getAll(['name' => 'asc']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpsertItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpsertItemRequest $request, Item $item)
    {
        $this->upsert($request, $item);

        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $this->itemService->delete($item);

        return redirect()->route('items.index');
    }

    private function upsert(UpsertItemRequest $request, Item $item): Item
    {
        $itemData =  ItemData::fromRequest($request);

        return $this->itemService->upsert($item, $itemData);
    }
}
