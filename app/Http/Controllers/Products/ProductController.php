<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Products\Product;
use App\Models\Products\Tag;
use App\Models\Products\Cost;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreProductRequest;
use App\Models\Products\Image;
use App\Models\Products\Characteristics;





class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('costs')->latest()->paginate(10);
       // dd($products,  $categories );
        return view('product.index', compact('products',  'categories'));
    }

    public function create()
    {
        $categories = Category::all();
       // dd($categories);
        return view('product.create', compact('categories'));
    }


    public function store(StoreProductRequest $request)
    {
       // dd($request->validated());
        // Проверяем входящие данные на соответствие правилам валидации
        $validatedData = $request->validated();

        // Если есть ошибки валидации, выводим их

        $product = Product::createProduct($validatedData);

        // Прикрепление категорий к продукту
        if ($request->has('category_ids')) {
            $product->categories()->attach($request->category_ids);
        }

        // Добавление стоимости продукта
        $product->addCost($request->only([
            'price', 'currency', 'discount_percentage', 'sale'
        ]));

        // Добавление характеристик продукта
        $product->characteristics()->create($request->only([
            'producer', 'display_size', 'resolving_power', 'screen', 'matrix_type', 'screen_refresh_rate',
            'processor', 'number_of_processor_cores', 'RAM_type', 'RAM_capacity', 'types_of_hard_drives',
            'SSD_size', 'video_card_type', 'video_card', 'amount_of_VRAM', 'OS', 'battery_capacity',
            'weight', 'country_of_production'
        ]));

        // Сохранение изображений продукта
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = $image->store('images', 'public');
                $product->addImage($filename);
            }
        }

        // Добавление тегов продукта
        if ($request->has('tags')) {
            foreach ($request->tags as $tag) {
                $product->addTag($tag);
            }
        }

        // Возвращение ответа с редиректом на страницу созданного продукта
        return redirect()->route('products.show', $product->id)
            ->with('success', 'Продукт создан.');
    }


    public function show($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        //dd($product);
        return view('product.show', compact('product', 'categories'));
    }

    public function edit($id)
    {
        $product = Product::with(['images', 'costs', 'tags', 'characteristics'])->find($id);
        $product = Product::findOrFail($id);

        // Получаем категории данного продукта
        $categories = $product->categories;

        // Теперь у вас есть коллекция категорий для данного продукта
        //dd($product,$categories);
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        // Находим продукт по его идентификатору
        $product = Product::findOrFail($id);

        // Обновляем данные продукта
        $product->update($request->validated());

        // При необходимости обновляем другие связанные сущности, например, категории, стоимость, характеристики и т. д.

        // Возвращаем ответ пользователю
        return redirect()->route('products.show', $product->id)->with('success', 'Продукт успешно обновлен.');
    }

    public function destroy($id)
    {
        // Удаление продукта
    }
}
