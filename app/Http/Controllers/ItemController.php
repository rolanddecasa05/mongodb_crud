<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateItemValidation;
use App\Services\ItemService;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function __construct(public ItemService $itemService) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->itemService->getAll($request->query());
        return response()->json(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->itemService->create($request->all());
            return response()->json(['message' => 'Data has been created.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th]);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->itemService->get($id);
        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $this->itemService->update($request->all(), $id);
            return response()->json(['message' => 'Data has been updated.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->itemService->delete($id);
            return response()->json(['message' => 'Data has been removed.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th]);
        }
    }

    /**
     * Display a listing of the resource lookup.
     */
    public function lookup(Request $request)
    {
        return $data = $this->itemService->getLookup();
        return response()->json(['data' => $data]);
    }
}
