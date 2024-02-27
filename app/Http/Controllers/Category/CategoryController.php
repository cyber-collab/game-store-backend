<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\SubCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::latest()->paginate(10);
        $data['categories'] = $categories;
        return  view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
        ]);

        if (!empty($data['title'])) {
            Category::create($data);
        }
        return redirect()->route('category.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $subCategories = SubCategory::all();
        return view('category.edit', compact('category', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, int $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());
        $category->subcategories()->sync($request->subcategories);

        return redirect()->route('categories.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category) {
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
        } else {
            return redirect()->route('categories.index')->with('error', 'Category not found');
        }
    }
}
