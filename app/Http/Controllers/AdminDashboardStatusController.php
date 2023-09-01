<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardStatusController extends Controller
{
    //

    public function index()
    {
        $productsCount = \App\Models\products::count();
        $employeesCount = \App\Models\User::where('role_id',2)->count();
        $customersCount = \App\Models\User::where('role_id',4)->count();
        // $ordersCount = \App\Models\orders::count();
        $driversCount = \App\Models\User::where('role_id',3)->count();

        return view('dashboard.index',compact('productsCount','employeesCount','customersCount','driversCount'));
    }
}
