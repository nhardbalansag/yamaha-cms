<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\API\CustomerAPIController;
use App\Http\Controllers\API\DocumentsController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth')->group(function(){
    Route::middleware('user:customer')->group(function(){
        Route::get('/authenticate', [HomeController::class, 'index']);
    });
});




Route::post('/login', [CustomerAPIController::class, 'login']);
Route::post('/register', [CustomerAPIController::class, 'register']);

//AUTH
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/{limit}', [ProductAPIController::class, 'index']);
    Route::post('/view/product', [ProductAPIController::class, 'getoneProduct']);
    Route::post('/sendMessage/inquiry', [CustomerAPIController::class, 'sendInquiry']);
    Route::post('/credentials/edit', [CustomerAPIController::class, 'EditCustomerRecord']);
    Route::post('/getCount', [CustomerAPIController::class, 'getCount']);
    Route::post('/getOrder/{limit}', [ProductAPIController::class, 'getOrder']);
    Route::post('/confirmEmail', [CustomerAPIController::class, 'confirmEmail']);
    Route::post('/confirmVerification', [CustomerAPIController::class, 'confirmVerification']);
    Route::get('/viewAllDocumentCategory/view/all', [DocumentsController::class, 'viewAllDocumentCategory']);
    Route::post('/send-document', [DocumentsController::class, 'sendDocument']);
    Route::get('/search/product/{search}', [ProductAPIController::class, 'searchProducts']);
});

