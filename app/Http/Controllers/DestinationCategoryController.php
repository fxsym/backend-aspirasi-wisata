<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDestinationCategoryRequest;
use App\Http\Requests\UpdateDestinationCategoryRequest;
use App\Models\DestinationCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DestinationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinationCategories = DestinationCategory::with('destinations')->get();
        return response()->json($destinationCategories, 200);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDestinationCategoryRequest $request)
    {
        $category = DestinationCategory::create($request->validated());
        return response()->json([
            'status' => 'success',
            'data' => $category
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDestinationCategoryRequest $request, DestinationCategory $destinationCategory)
    {
        $validated = $request->validated();
        $destinationCategory->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Kategori destinasi berhasil diperbarui.',
            'data' => $destinationCategory
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
