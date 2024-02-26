<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\SubCategory;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Resources\SubCategoryResource;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = SubCategory::latest()->paginate(10);
        $data['categories'] = $categories;
        return view('subcategories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('subcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCategoryRequest $request): RedirectResponse
    {
        SubCategory::create($request->validated());

        return redirect()->route('subcategories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory, int $id): SubCategoryResource
    {
        $subCategory = SubCategory::findOrFail($id);

        return new SubCategoryResource($subCategory);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory, int $id): View
    {
        $subCategory = SubCategory::findOrFail($id);
        return view('subcategories.edit', compact('subCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryRequest $request, int $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->update($request->validated());

        return redirect()->route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory): Response
    {
        $subCategory->delete();

        return response()->noContent();
    }
}
