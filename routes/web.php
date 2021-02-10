<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\ProductCategoryController;
use App\Http\Controllers\Admin\Product\Specification;
use App\Http\Controllers\WebApp\HomeController;
use App\Http\Controllers\WebApp\InquiryController;
use App\Http\Controllers\WebApp\HomeProductController;
use App\Http\Controllers\WebApp\LoginRegisterController;
use App\Http\Controllers\Customer\Account;
use App\Http\Controllers\Customer\DocumentController;
use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\Loan\LoanController;
use App\Http\Controllers\Admin\Notification\NotificationController;

/*x
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home page');
Route::get('/home/product/{id}', [HomeProductController::class, 'viewOne'])->name('view product');
Route::get('/home/product/{search}/inquiry', [InquiryController::class, 'index'])->name('inquiry');

Route::get('/customer/login', [LoginRegisterController::class, 'login'])->name('user login');
Route::get('/customer/register', [LoginRegisterController::class, 'register'])->name('user register');

Route::middleware('auth')->group(function(){
    Route::middleware('user:customer')->group(function(){
        Route::get('/home', [HomeController::class, 'index'])->name('home page');
        Route::get('/my-account', [Account::class, 'index'])->name('my account');
        Route::get('/my-account/loan/application', [Account::class, 'loanApplication']);
        Route::get('/my-account/order/{product_id}/payment/{customer_id}', [Account::class, 'payment']);
        Route::get('/my-account/order/{product_id}/payment/{customer_id}', [Account::class, 'payment']);

        //PAYMENT
        Route::get('/my-account/checkout/{user_id}/{product_id}/{amount}', [Account::class, 'checkoutDetails']);

        //EMAIL VERIFICATION
        Route::get('/my-account/verify/index', [Account::class, 'verifyEmail']);
        Route::post('/my-account/verify/email/code', [Account::class, 'verifyCode']);

        //Documents
        Route::get('/my-account/credential/documents/set-up', [DocumentController::class, 'index']);
        Route::get('/my-account/credential/documents/resubmit/{id}', [DocumentController::class, 'resubmit']);
    });
});

Route::middleware('auth')->group(function(){
    Route::middleware('user:admin')->group(function(){
        Route::get('/home/admin', [HomeController::class, 'index'])->name('home page');
        Route::get('/dashboard',  [Dashboard::class, 'index'])->name('dashboard');

        Route::get('/product',  [ProductController::class, 'productIndex'])->name('product index');
        Route::get('/product/create',  [ProductController::class, 'index'])->name('product');
        Route::get('/product/all',  [ProductController::class, 'viewAll'])->name('view all product');
        Route::get('/product/pending',  [ProductController::class, 'pendingProduct'])->name('pending products');
        Route::get('/product/publish',  [ProductController::class, 'publishProduct'])->name('publish products');
        Route::get('/product/view/{id}', [ProductController::class, 'viewOne'])->name('view one product');
        Route::get('/product/amortization/add', [ProductController::class, 'addamortization']);

        Route::get('/product/createCategory',  [ProductCategoryController::class, 'index'])->name('product category');

        Route::get('/product/specificationCategory/create',  [Specification::class, 'index'])->name('specification category');
        Route::get('/product/product/edit/{id}',  [ProductController::class, 'editProduct']);
        Route::get('/edit/product/specifications/{id}',  [ProductController::class, 'editSpecifications']);

        //CUSTOMER
        Route::get('/customer-all',  [CustomerController::class, 'index']);
        Route::get('/customer-all/not-verified',  [CustomerController::class, 'viewNotVerified']);
        Route::get('/customer-all/verified',  [CustomerController::class, 'verified']);
        Route::get('/customer-all/inquiries',  [CustomerController::class, 'inquiries']);

        //LOAN APPLICANTS
        Route::get('/loan/applicants',  [LoanController::class, 'index']);
        Route::get('/loan/applicants/{id}',  [LoanController::class, 'viewCustomerDocument']);

        //ORDERS
        Route::get('/order/{id}',  [CustomerController::class, 'viewoneInquiry']);
        Route::get('/orders/viewallOrders/transactions',  [CustomerController::class, 'viewallOrders']);
        Route::get('/orders/viewallOrders/transactions/{id}',  [CustomerController::class, 'viewoneOrderTransaction']);
        Route::get('/orders/viewallOrders/active',  [CustomerController::class, 'activeTransaction']);
        Route::get('/orders/viewallOrders/done',  [CustomerController::class, 'doneTransaction']);
        Route::get('/orders/viewallOrders/deliver',  [CustomerController::class, 'deliverTransaction']);

        //reservations
        Route::get('/reservations',  [CustomerController::class, 'viewAllreservations']);

        //generate pdf
        Route::get('/orders/viewallOrders/transactions/invoice-pdf/{id}',  [CustomerController::class, 'createPdf']);

    });
});

    Route::get('/account/verify/{email}', [Account::class, 'verify'])->name('verification');


//test email
Route::get('/test',  [NotificationController::class, 'sendOrderStatusDeliver']);
