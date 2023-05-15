<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

// Route::get('dashboard', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class,'checkRoleid']);


 
Route::resource('dashboard/customer', CustomerController::class)->name('index', 'customer');




Route::get('/admin', function () {
    return view('dashboard.index');
})->name('admin.dashboard');

Route::get('/employee', function () {
    return view('dashboard.index');
})->name('employee.dashboard');

Route::get('/driver', function () {
    return view('driver');
})->name('driver.dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', [HomeController::class,'checkRoleid']);
});
