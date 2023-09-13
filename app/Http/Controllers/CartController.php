<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

        $user = $request->user();

        // $product=$request->product_id;
        // return $product;

        // $quantity=$request->quantity;

        // extract the product id and quantity from the request's json body
        // $product_id = $request->product_id;
        // $quantity = $request->quantity;

        // return $product_id;

        //check if the user has a cart
        $cart = Cart::where('user_id', $user->id)->where('is_paid', false)->first();


        //if not create a new cart
        if (!$cart) {
            $cart = Cart::create([
                'user_id' => $user->id,
                'is_paid' => false,
                'total' => 0,
            ]);
        }

        //check products alredy in cart
        $cartItem = $cart->items()->where('product_id', $request->product_id)->first();
        $product = products::find($request->product_id);
        $price = $product->price;

        //if product is in cart, increase quantity
        if ($cartItem) {
            

            $newTotal = $price *($cartItem->quantity + $request->quantity);
            $cartItem->update([
                'quantity' => $cartItem->quantity + $request->quantity,
                'total' => $newTotal,
            ]);

        } else {

            // get the product price
            // $product = products::find($request->product_id);
            // $price = $product->price;

            //if the product is not in te cart add it
            $cartItem = $cart->items()->create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'total' => $price * $request->quantity,
            ]);
        }
        $cart->refresh();
        //calculate the cart total

         $cartTotal = $cart->items()->sum('total');


        //update the cart total

        $cart->update([
            'total' => $cartTotal,
        ]);

        return response()->json([
            'message' => 'Product added to cart',
            'cart' => $cart,
        ]);



    }
}