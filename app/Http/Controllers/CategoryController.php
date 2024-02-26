<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(public CategoryService $categoryService) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->categoryService->getAll($request->query());
        return response()->json(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->categoryService->create($request->all());
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
        $data = $this->categoryService->get($id);
        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $this->categoryService->update($request->all(), $id);
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
            $this->categoryService->delete($id);
            return response()->json(['message' => 'Data has been removed.']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th]);
        }
    }
}
