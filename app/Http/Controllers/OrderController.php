<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function completeCart(Request $request, Cart $cart)
    {

        // dd($cart);


        //check if the cart exists and is not already paid
        if (!$cart || $cart->is_paid) {
            return response()->json(['message' => 'Cart not found or already completed'], 404);
        }

        // $address = $request->delivery_address;
        // $ZIP_code = $request->ZIP_code;
        // $city = $request->city;
        // $delivery_type = $request->delivery_type;
        // return $address;
        //Make the cart as completed (is_paid = true)
        

        // Find the highest order number in the database and increment it by 1
        $latestOrderNumber = Order::max('order_number');
        if ($latestOrderNumber) {
            $orderNumber = 'order' . (intval(substr($latestOrderNumber, 5)) + 1);
        } else {
            $orderNumber = 'order1';
        }

        //Create an order 
        Order::create([
            'user_id' => $cart->user_id,
            'cart_id' => $cart->id,
            'total' => $cart->total,
            'status' => 'pending',
            'delivery_address' => $request->delivery_address,
            'ZIP_code' => $request->ZIP_code,
            'city' => $request->city,
            'delivery_type' => $request->delivery_type,
            'order_number' => $orderNumber,
        ]);

        $cart->update([
             'is_paid' => true,
        ]);



        return response()->json(['message' => 'cart marked as completed', 'order_number' => $orderNumber], 200);


    }
}