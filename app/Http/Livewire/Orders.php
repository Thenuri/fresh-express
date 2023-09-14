<?php

namespace App\Http\Livewire;

use App\Mail\DispatchedOrder;
use App\Models\Order;
use App\Notifications\DispatchOrderNotification;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Orders extends Component
{
    public function render()
    {
        $newOrders = Order::with('user', 'cart', 'products')->where('status', 'pending')->get();
        $previousOrders = Order::with('user', 'cart', 'products')->where('status', 'complete')->get();
        $canceledOrders = Order::with('user', 'cart', 'products')->where('status', 'canceled')->get();
        // $orders = Order::with('user','cart','products' ,'cartItems')->get();
        return view('livewire.orders', [
            'newOrders' => $newOrders,
            'previousOrders' => $previousOrders,
            'canceledOrders' => $canceledOrders,
        ]);
    }

    public function dispatchOrder($orderId)
    {
        $order = Order::find($orderId);
        if ($order) {
            // Update the order status to "complete"
            $order->update(['status' => 'complete']);

            $order->user->notify((new DispatchOrderNotification($order)));

            // You can move the order to the "Previous Orders" table if needed, or handle it as per your application's logic.
        }
        session()->flash('message', 'Order dispatched successfully');
        // Mail::to($order->user->email)->send(new DispatchedOrder($order));
    }
}