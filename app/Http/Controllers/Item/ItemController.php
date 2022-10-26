<?php

namespace App\Http\Controllers\Item;
use App\Http\Controllers\Controller;
use App\Http\Requests\Item\AddOrUpdateItemRequest;
use App\Http\Resources\Item\ItemResource;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return response()->json(['items' => ItemResource::collection($items)]);
    }

    public function store(AddOrUpdateItemRequest $request)
    {
        $item = Item::create($request->validated());
        return response()->json([
            'item' => new ItemResource($item)
        ]);
    }

    public function show(Item $item)
    {
        return response()->json([
          'item' => new ItemResource($item)
        ]);
    }

    public function update(AddOrUpdateItemRequest $request, Item $item)
    {
        $item->update($request->validated());
        return response()->json([
           'item' => new ItemResource($item)
        ]);
    }
}
