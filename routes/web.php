<?php

use App\Http\Controllers\Approval;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Routing\Controllers\Middleware;
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
// Route::get('/admin/approval', [AdminController::class, 'approval'])->name('admin.approval');


Route::get('/', [HomeController::class,'checkRoleid']);

Route::post('/admin/change-status/{user}', [Approval::class, 'switchStatus'])
->name('admin.approve')->middleware('adminOrEmployee');

Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard/customer', CustomerController::class)->name('index', 'customer');
    Route::resource('dashboard/employee', EmployeeController::class)->name('index', 'employee');
    Route::resource('dashboard/approval', Approval::class)->name('index', 'approval');
    Route::view('dashboard/orders', 'dashboard.orders')->name('orders');
    //Route::view('dashboard/products', 'dashboard.products')->name('products');
});

Route::get('/admin', function () {
    return view('dashboard.index');
})->name('admin.dashboard')
->middleware(['adminOrEmployee','auth']);

Route::get('/employee', function () {
    return view('dashboard.index');
})->name('employee.dashboard')
->middleware(['adminOrEmployee','userApproved']);

Route::get('/driver', function () {
    return view('driverdash');
})->name('driver.dashboard')
->middleware(['userApproved']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', [HomeController::class,'checkRoleid']);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard/products', function () {
        return view('dashboard.products');
    })->name('products');
});