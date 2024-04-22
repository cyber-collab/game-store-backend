<?php

use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\HomeBlockHeroController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('api-home-hero', HomeBlockHeroController::class);
Route::apiResource('api-partners', PartnerController::class);
Route::apiResource('api-categories', CategoryController::class);
Route::apiResource('api-subcategories', SubCategoryController::class);
Route::apiResource('api-banners', BannerController::class);
Route::apiResource('api-products', ProductController::class);
Route::get('/api-new-products', [ProductController::class, 'getProductsByTagNew']);
Route::get('/api-top-products', [ProductController::class, 'getProductsByTagTopSales']);
Route::get('/api-products/category/{slug}', [ProductController::class, 'getProductsByCategory']);
Route::get('/api-products/{categorySlug}/{subcategorySlug}', [ProductController::class, 'getProductsBySubcategory']);
