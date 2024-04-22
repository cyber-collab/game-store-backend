<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Http\Requests\Category\CategoryCreateRequest;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Psy\Util\Str;
use Illuminate\Support;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        $data['categories'] = $categories;
        return   view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item = new Category();
        $categoryList = Category::all();

        return view('category.create', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request)
    {
        $data = $request->all();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $parentCategoryName = 'Без категорії';
        $parentCategoryId = 0;

        if (!empty($data['parent_id'])) {
            $parentCategory = Category::find($data['parent_id']);
            if ($parentCategory) {
                $parentCategoryName = $parentCategory->name;
                $parentCategoryId = $parentCategory->id;
            }
        }
        $data['name'] = $parentCategoryName;
        $data['parent_id'] = $parentCategoryId;

        $item = Category::create($data);

        if ($item) {
            return redirect()->route('categories.index')->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка  сохранения'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Category::findOrFail($id);
        $categoryList = Category::all();
        //dd($item);
        // Проверяем наличие родительской категории
        if (!empty($item->parent_id)) {
            $parentCategory = Category::find($item->parent_id);
            if ($parentCategory) {
                // Если родительская категория существует, устанавливаем ее имя и ID
                $parentCategoryName = $parentCategory->name;
                $parentCategoryId = $parentCategory->id;
            }
        } else {
            // Если родительская категория отсутствует, устанавливаем значение "Без категорії"
            $parentCategoryName = 'Без категорії';
            $parentCategoryId = 0;
        }

        // Устанавливаем имя родительской категории и parent_id для передачи в представление
        $item->name = $parentCategoryName;
        $item->parent_id = $parentCategoryId;

        return view('category.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Найти категорию для редактирования
        $item = Category::find($id);

        // Если категория не найдена, вернуть ошибку
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        // Получить все данные из запроса
        $data = $request->all();
        //dd($item, $data);
        // Установить имя родительской категории
        $parentCategoryName = 'Без категории';

        // Если выбрана родительская категория
        if (!empty($data['parent_id'])) {
            $parentCategory = Category::find($data['parent_id']);
            if ($parentCategory) {
                $parentCategoryName = $parentCategory->title;
            }
        }

        // Установить имя родительской категории в поле name
        $data['name'] = $parentCategoryName;

        // Если родительская категория не выбрана, установить parent_id в 0
        if (empty($data['parent_id'])) {
            $data['parent_id'] = 0;
        }

        // Обновить категорию с полученными данными
        $result = $item->update($data);
        return redirect()
            ->route('categories.index', $item->id)
            ->with(['success' => 'Успешно сохранено']);
        // dd($result);
        // Проверить результат обновления и вернуть соответствующий редирект
       /* if ($result) {
            return redirect()
                ->route('categories.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }*/
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
