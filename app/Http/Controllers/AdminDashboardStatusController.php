<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\products;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminDashboardStatusController extends Controller
{
    public function index()
    {
        $productsCount = products::count();
        $employeesCount = User::where('role_id', 2)->count();
        $customersCount = User::where('role_id', 4)->count();
        $driversCount = User::where('role_id', 3)->count();
        $latestOrders = $this->showLatestCustomers();
        $mostOrderedProduct = $this->getMostOrderedProduct(); // Get the most ordered product
        $cartCount = $this->getNumberOfCarts();
        $orderCount = $this->getNumberOfOrders();

        return view('dashboard.index', compact('productsCount', 'employeesCount', 'customersCount', 'driversCount', 'latestOrders', 'mostOrderedProduct', 'cartCount' , 'orderCount'));
    }

    private function showLatestCustomers()
    {
        // Fetch the latest orders and limit it to 5
        $latestOrders = Order::latest()->take(5)->get();

        // Load the associated user information for each order
        foreach ($latestOrders as $order) {
            $order->load('user');
        }

        return $latestOrders;
    }

    private function getMostOrderedProduct()
    {
        return products::select('products.*')
        ->join('cart_items', 'products.id', '=', 'cart_items.product_id')
        ->join('orders', 'cart_items.cart_id', '=', 'orders.cart_id')
        ->groupBy('products.id', 'products.name')
        ->orderByRaw('COUNT(cart_items.id) DESC')
        ->first();
    }

    private function getNumberOfCarts()
    {
        return Cart::count();
    }
    private function getNumberOfOrders()
    {
        return Order::count();
    }
}
