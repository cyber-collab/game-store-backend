<?php

namespace App\Http\Controllers\Category;

use Illuminate\View\View;
use App\Models\SubCategory;
use App\Models\Category\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::latest()->paginate(10);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $subCategories = SubCategory::all();
        return view('category.create', compact('subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $category = Category::create($request->validated());
        $category->subcategories()->attach($request->subcategories);

        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        $subCategories = SubCategory::all();
        return view('category.edit', compact('category', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, int $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());
        $category->subcategories()->sync($request->subcategories);

        return redirect()->route('categories.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        if ($category) {
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
        } else {
            return redirect()->route('categories.index')->with('error', 'Category not found');
        }
    }
}
