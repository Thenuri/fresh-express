<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ShowLatestCustomersController extends Controller
{
    

    // public function showLatestCustomers()
    // {
    //     //fetch the laest orders and limit it to 5
    //     $latestOrders  = Order::latest()->take(5)->get();

    //     //load the associated user information for each order
    //     foreach ($latestOrders as $order) {
    //         $order->load('user');
    //     }

    //     dd($latestOrders);
    //     //return the view with the orders
    //     return view('dashboard.index', [
    //         'latestOrders' => $latestOrders
    //     ]);
    // }
}
