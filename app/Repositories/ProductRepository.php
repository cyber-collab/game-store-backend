<?php

namespace App\Repositories;

use App\Http\Resources\ProductResource;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Products\Cost;
use App\Models\Products\Product;
use App\Models\SubCategory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::all());
    }

    public function getProductsByTagTopSales(): AnonymousResourceCollection
    {
        $products = Product::has('tags')->whereHas('tags', function ($query) {
            $query->whereIn('tag', [DB::raw("UPPER('топ')"), DB::raw("UPPER('новинки')")]);
        })->get();

        return ProductResource::collection($products);
    }

    public function getProductsByCategory(string $slug): AnonymousResourceCollection
    {
        $products = Product::whereHas('categories', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get();

        return ProductResource::collection($products);
    }

    public function getProductsBySubcategory(string $categorySlug, string $subCategorySlug): AnonymousResourceCollection
    {
        $products = Product::whereHas('categories', function ($query) use ($categorySlug) {
            $query->where('slug', $categorySlug);
        })->get();

        $subCategoryId = SubCategory::where('slug', $subCategorySlug)->value('id');

        $filteredProducts = $products->filter(function ($product) use ($subCategoryId) {
            return $product->categories->contains('pivot.subcategory_id', $subCategoryId);
        });

        return ProductResource::collection($filteredProducts);
    }

    public function getProductsByTagNew(): AnonymousResourceCollection
    {
        $products = Product::has('tags')->whereHas('tags', function ($query) {
            $query->where('tag', DB::raw("UPPER('новинки')"));
        })->get();

        return ProductResource::collection($products);
    }

    public function getProductsByKeywords(string $keyword): AnonymousResourceCollection
    {
        $products = Product::where(function ($query) use ($keyword) {
            $query->where('title', 'ILIKE', '%' . $keyword . '%')
                ->orWhere('description', 'ILIKE', '%' . $keyword . '%');
        })->with('tags')->get();

        return ProductResource::collection($products);
    }

    public function getProductsSortingByDate(string $sortingMethod = 'desc'): AnonymousResourceCollection
    {
        $products = Product::orderBy('created_at', $sortingMethod)->get();

        return ProductResource::collection($products);
    }

    public function getProductsSortingByPrice(string $sortingMethod): AnonymousResourceCollection
    {
        $products = Product::select(['products.*', 'costs.price as cost_price'])
        ->join('costs', 'costs.product_id', '=', 'products.id')
        ->orderBy('cost_price', $sortingMethod)->get();

        return ProductResource::collection($products);
    }

    public function getProductsById(int $id): ProductResource
    {
        $product = Product::findOrFail($id);

        return new ProductResource($product);
    }
}
