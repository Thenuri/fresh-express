<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\products;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminDashboardStatusController extends Controller
{
    public function index()
    {
        $products = products::all();

        $productsCount = products::count();
        $employeesCount = User::where('role_id', 2)->count();
        $customersCount = User::where('role_id', 4)->count();
        $driversCount = User::where('role_id', 3)->count();
        $latestOrders = $this->showLatestCustomers();
        $mostOrderedProduct = $this->getMostOrderedProduct(); // Get the most ordered product
        $cartCount = $this->getNumberOfCarts();
        $orderCount = $this->getNumberOfOrders();
        $weeklyRevenue = $this->getWeeklyRevenue();
        $productSales = $this->getProductSales();
        $categorySales = $this->getSalesByCategory();
        $supplierCount = $this->getSupplier();

        return view('dashboard.index', compact('products','productsCount', 'employeesCount', 'customersCount', 'driversCount', 'latestOrders', 'mostOrderedProduct', 'cartCount' , 'orderCount', 'weeklyRevenue', 'productSales', 'categorySales', 'supplierCount'));
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

    private function getWeeklyRevenue()
    {$weeklyRevenue = Order::select(
        DB::raw('SUM(total) as total_revenue'),
        DB::raw('strftime("%W", created_at) as week_number')
        // For MySQL, you can use: DB::raw('WEEK(created_at) as week_number')
    )
    ->groupBy('week_number')
    ->orderBy('week_number')
    ->get();

    return $weeklyRevenue;
    }

    private function getProductSales()
    {
        // Use Eloquent relationships to get completed orders with their cart items
        $completedOrders = Order::where('status', 'complete')
            ->with('cartItems.product')
            ->get();

        // Initialize an empty array to store product sales data
        $productSales = [];

        // Iterate through completed orders and calculate product sales
        foreach ($completedOrders as $order) {
            foreach ($order->cartItems as $cartItem) {
                $productId = $cartItem->product->id;
                $quantitySold = $cartItem->quantity;

                // Add product sales to the array or update existing sales
                if (isset($productSales[$productId])) {
                    $productSales[$productId] += $quantitySold;
                } else {
                    $productSales[$productId] = $quantitySold;
                }
            }
        }

        // Now $productSales contains total sales for each product
        return $productSales;
    }

    private function getSalesByCategory()
    {
        $completedOrders = Order::where('status', 'complete')
            ->with('cartItems.product') // Load products
            ->get();

        $categorySales = [];

        foreach ($completedOrders as $order) {
            foreach ($order->cartItems as $cartItem) {
                $product = $cartItem->product;
                $category = $product->category; // Assuming category is stored in the 'category' column

                if (!isset($categorySales[$category])) {
                    $categorySales[$category] = 0; // Initialize category sales
                }

                $categorySales[$category] += $cartItem->quantity;
            }
        }

        return $categorySales;
    }

    private function getSupplier(){
        return Supplier::count();
    }

}
