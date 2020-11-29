<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\ProductCategoryController;
use App\Http\Controllers\Admin\Product\Specification;
use App\Http\Controllers\Admin\Product\Color;
use App\Http\Controllers\WebApp\HomeController;
use App\Http\Controllers\WebApp\InquiryController;
use App\Http\Controllers\WebApp\HomeProductController;
use App\Http\Controllers\WebApp\LoginRegisterController;
use App\Http\Controllers\Customer\Account;

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

// Route::get('/', function () {
//     return view('welcome');
// });  

Route::get('/', [HomeController::class, 'index'])->name('home page');
Route::get('/home/product/{id}', [HomeProductController::class, 'viewOne'])->name('view product');
Route::get('/home/product/{search}/inquiry', [InquiryController::class, 'index'])->name('inquiry');

Route::get('/customer/login', [LoginRegisterController::class, 'login'])->name('user login');
Route::get('/customer/register', [LoginRegisterController::class, 'register'])->name('user register');

Route::middleware('auth')->group(function(){
    Route::middleware('user:customer')->group(function(){
        Route::get('/home', [HomeController::class, 'index'])->name('home page');
        Route::get('/my-account/{id}', [Account::class, 'index'])->name('my account');
        Route::get('/my-account/loan/application', [Account::class, 'loanApplication']);
        Route::get('/my-account/order/{product_id}/payment/{customer_id}', [Account::class, 'payment']);
        Route::get('/my-account/services/{service_id}/{id}', [Account::class, 'payment']);
    });
});

Route::middleware('auth')->group(function(){
    Route::middleware('user:admin')->group(function(){
        Route::get('/home/admin', [HomeController::class, 'index'])->name('home page');
        Route::get('/dashboard',  [Dashboard::class, 'index'])->name('dashboard');

        Route::get('/product',  [ProductController::class, 'productIndex'])->name('product index');
        Route::get('/product/create',  [ProductController::class, 'index'])->name('product');
        Route::get('/product/all',  [ProductController::class, 'viewAll'])->name('view all product');
        Route::get('/product/view/{id}', [ProductController::class, 'viewOne'])->name('view one product');

        Route::get('/product/createCategory',  [ProductCategoryController::class, 'index'])->name('product category');

        Route::get('/product/specificationCategory/create',  [Specification::class, 'index'])->name('specification category');

    });
});

Route::middleware('auth')->group(function(){
    Route::get('/account/verify/{email}', [Account::class, 'verify']);
});


