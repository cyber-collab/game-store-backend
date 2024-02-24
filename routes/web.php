<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeBlockHeroController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;

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
Route::resource('block-home-hero', HomeBlockHeroController::class);
//Route::resource('product', ProdyctController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin-home', [AdminHomeController::class, 'index'])->name('admin_home');

