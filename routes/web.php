<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\ProductCategoryController;
use App\Http\Controllers\Admin\Product\Specification;
use App\Http\Controllers\Admin\Product\Color;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard',  [Dashboard::class, 'index'])->name('dashboard');

    Route::get('/product',  [ProductController::class, 'productIndex'])->name('product index');
    Route::get('/product/create',  [ProductController::class, 'index'])->name('product');
    Route::get('/product/all',  [ProductController::class, 'viewAll'])->name('view all product');
    Route::get('/product/view/{id}', [ProductController::class, 'viewOne'])->name('view one product');

    Route::get('/product/createCategory',  [ProductCategoryController::class, 'index'])->name('product category');

    Route::get('/product/specificationCategory/create',  [Specification::class, 'index'])->name('specification category');

});


