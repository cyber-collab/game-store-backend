<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeBlockHeroController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Resources\SubCategoryResources;
use App\Models\SubCategory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__.'/auth.php';
Auth::routes();

Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('categories', CategoryController::class);
Route::resource('subcategories', SubCategoryController::class);
Route::resource('block-home-hero', HomeBlockHeroController::class);
//Route::resource('product', ProdyctController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin-home', [AdminHomeController::class, 'index'])->name('admin_home');

Route::get('test2', function(){
    $xyx=SubCategory::find(1);
    return new SubCategoryResources($xyx);
});

