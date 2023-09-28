<?php

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ApiCartController;
use App\Http\Controllers\CartController;



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

Route::middleware('auth:sanctum')->post('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', [ApiUserController::class, 'requestToken']);

Route::post('register', [ApiUserController::class, 'register']);

// Route::get('getCustomerDetails', [ApiUserController::class, 'getCustomerDetails']);
Route::get('/products', [ProductController::class, 'index']);
// Get product categories
Route::get('/products/categories', [ProductController::class, 'getProductCategories']);


// Get products by category name
Route::get('/products/category/{categoryName}', [ProductController::class, 'getProductsByCategoryName']);

//Cart 
// Route::post('/add-to-cart', 'CartController@addToCart')->middleware('api.token');


// Route::group(['middleware' => 'api.token'], function () {
//     Route::post('/add-to-cart', 'CartController@addToCart');
    
// });

// Route::middleware('auth:sanctum')->post('/add-to-cart', function (Request $request) {
//     return $request->user();
    
// });

 //adding  the items to cart 
Route::middleware('auth:sanctum')->post('/add-to-cart', [CartController::class, 'addToCart']);

//creatimg an order and gettin the order details
Route::middleware('auth:sanctum')->post('/complete-cart/{cart}', [OrderController::class, 'completeCart']);



// Route::post('/complete-cart/{cart}', 'OrderController@completeCart');




// http://127.0.0.1:8000/api/products/categories/Fruit/





// send hello
Route::get('hello', function () {
    return 'Hello World';
});
//getting customer details to display in the profile page
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/customer/details', [ApiUserController::class, 'getCustomerDetails']);
    Route::get('user-loyalty-points', [ApiUserController::class, 'getUserLoyaltyPoints']);

});

//getting all the promotions
Route::get('/promotions', [ApiUserController::class, 'getPromotions']);

