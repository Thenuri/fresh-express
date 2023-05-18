<?php

use App\Http\Controllers\Approval;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
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

Route::resource('dashboard/employee', EmployeeController::class)->name('index', 'employee');


//Route::get('/admin/approval', [AdminController::class, 'approval'])->name('admin.approval');
Route::resource('dashboard/approval', Approval::class)->name('index', 'approval');

Route::post('/admin/change-status/{user}', [Approval::class, 'switchStatus'])->name('admin.approve');



Route::get('/admin', function () {
    return view('dashboard.index');
})->name('admin.dashboard')
->middleware(['adminOrEmployee','userApproved']);


Route::get('/employee', function () {
    return view('dashboard.index');
})->name('employee.dashboard')
->middleware([ 'userApproved']);

Route::get('/driver', function () {
    return view('driver');
})->name('driver.dashboard')
->middleware(['userApproved']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', [HomeController::class,'checkRoleid']);
});
