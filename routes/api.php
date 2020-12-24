<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\API\CustomerAPIController;

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


Route::get('/', [ProductAPIController::class, 'index']);

Route::get('/login', [CustomerAPIController::class, 'login']);
Route::post('/register', [CustomerAPIController::class, 'register']);
