<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Products\Product;
use App\Models\Products\Tag;
use App\Models\Products\Cost;
use Illuminate\Http\Request;
use App\Http\Requests\Product\UpdateProductRequest;
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
        return view('product.index', compact('products',  'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        $characteristics = new \stdClass(); // Создаем пустой объект
        return view('product.create', compact('categories', 'characteristics' ));
    }


    public function store(StoreProductRequest $request)
    {

        // We check incoming data for compliance with validation rules
        $validatedData = $request->validated();

        $product = Product::createProduct($validatedData);


        // Attaching categories to a product  Додавання категорій до товару
        if ($request->has('category_ids')) {
            $product->categories()->attach($request->category_ids);
        }

        // Adding Product Value
        $product->addCost($request->only([
            'price', 'currency', 'discount_percentage', 'sale'
        ]));

        // Adding Product Features
        $product->characteristics()->create($request->only([
            'producer', 'display_size', 'resolving_power', 'screen', 'matrix_type', 'screen_refresh_rate',
            'processor', 'number_of_processor_cores', 'RAM_type', 'RAM_capacity', 'types_of_hard_drives',
            'SSD_size', 'video_card_type', 'video_card', 'amount_of_VRAM', 'OS', 'battery_capacity',
            'weight', 'country_of_production'
        ]));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = $image->store('images', 'public');
                $product->addImage($filename);
            }
        }
        // Adding Product Tags
        if ($request->has('tags')) {
            foreach ($request->tags as $tag) {
                $product->addTag($tag);
            }
        }

        return redirect()->route('products.show', $product->id)
            ->with('success', 'Продукт создан.');
    }


    public function show($id)
    {
        $categories = Category::all();
        $product = Product::with(['images', 'costs', 'tags', 'characteristics'])->find($id);
        //$product = Product::findOrFail($id);
        //dd($product);
        $characteristics = $product->characteristics;
       //dd($characteristics);
        return view('product.show', compact('product', 'categories', 'characteristics'));
    }

    public function edit($id)
    {

        $product = Product::with(['images', 'costs', 'tags', 'characteristics'])->find($id);
        //dd($product);
       // $product = Product::findOrFail($id);
        $characteristics = $product->characteristics;
        $costs = $product->costs->toArray();
        //dd($costs);
        $categories = $product->categories;
        return view('product.edit', compact('product', 'categories', 'characteristics', 'costs'));
    }

    public function update(UpdateProductRequest $request, $id)
    {

        $validatedData = $request->validated();
        $validatedData['id'] = $id;
        $product = Product::updateProduct($validatedData);

        return redirect()->route('products.show', $product->id)
            ->with('success', 'Продукт успешно обновлен.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Продукт успешно удален.');
    }
}
