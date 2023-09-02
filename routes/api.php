<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\ProductController;

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


Route::post('login', [ApiUserController::class, 'requestToken']);

Route::post('register', [ApiUserController::class, 'register']);

Route::get('/products', [ProductController::class, 'index']);
// Get product categories
Route::get('/products/categories', [ProductController::class, 'getProductCategories']);


// Get products by category name
Route::get('/products/category/{categoryName}', [ProductController::class, 'getProductsByCategoryName']);

// http://127.0.0.1:8000/api/products/categories/Fruit/

// send hello
Route::get('hello', function () {
    return 'Hello World';
});