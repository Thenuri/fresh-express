<?php

namespace App\Http\Livewire;

use App\Mail\DispatchedOrder;
use App\Models\Order;
use App\Models\User;
use App\Notifications\DispatchOrderNotification;
use DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{   use WithPagination;
    public $q;
    public $driver;

    public $selectedDriver;
    // public $orders;

    protected $queryString = [
        'q' => ['except' => ''],

    ];
    public function mount()
    {
        $this->drivers = User::where('role_id', 3)->get();
    }
    public function render()
    {
        $newOrders = Order::with('user', 'cart', 'products')->where('status', 'pending')->when(
            $this->q, function($query){
                return $query->where(function($query){
                    $query->where('id','like','%'.$this->q.'%')
                        ->orWhere('ZIP_code','like','%'.$this->q.'%')
                        ->orWhere('order_number','like','%'.$this->q.'%');
                });
            })->paginate(5);

        $previousOrders = Order::with('user', 'cart', 'products')->where('status', 'complete')->when(
            $this->q, function($query){
                return $query->where(function($query){
                    $query->where('id','like','%'.$this->q.'%')
                        ->orWhere('ZIP_code','like','%'.$this->q.'%')
                        ->orWhere('order_number','like','%'.$this->q.'%');
                })  ;
            })->paginate(5);
        $canceledOrders = Order::with('user', 'cart', 'products')->where('status', 'canceled')->when(
            $this->q, function($query){
                return $query->where(function($query){
                    $query->where('id','like','%'.$this->q.'%')
                        ->orWhere('ZIP_code','like','%'.$this->q.'%')
                        ->orWhere('order_number','like','%'.$this->q.'%');
                });
            })->paginate(5);
        // $orders = Order::with('user','cart','products' ,'cartItems')->get();
        return view('livewire.orders', [
            'newOrders' => $newOrders,
            'previousOrders' => $previousOrders,
            'canceledOrders' => $canceledOrders,
            'drivers'=>$this->drivers,
        ]);
    }

    public function updatingq()
    {
        $this->resetPage();
    }
    // public function dispatchOrder($orderId)
    // {
    //     $order = Order::find($orderId);
    //     if ($order) {
    //         // Update the order status to "complete"
    //         $order->update(['status' => 'complete']);

    //         $order->user->notify((new DispatchOrderNotification($order)));

    //         // You can move the order to the "Previous Orders" table if needed, or handle it as per your application's logic.
    //     }
    //     session()->flash('message', 'Order dispatched successfully');
    //     // Mail::to($order->user->email)->send(new DispatchedOrder($order));
    // }

    public function dispatchOrder($orderId)
    {
        $order = Order::find($orderId);

        if ($order) {

            $this->validate([
                'selectedDriver' => 'required',
            ]);
            //Find the driver
            $driver = User::where('role_id', 3)->find($this->selectedDriver);
            if (!$driver) {
                session()->flash('error', 'Driver not found');
                return;
            }
            // Begin a database transaction
            DB::beginTransaction();

            try {
                // Update the order status to "complete"
                $order->update(['status' => 'complete', 'driver_id' => $driver->id]);

                // Reduce product quantities and update dispatched_quantity
                foreach ($order->cartItems as $cartItem) {
                    $product = $cartItem->product;

                    // Ensure that the product quantity doesn't go below zero
                    $newProductQuantity = max(0, $product->quantity - $cartItem->quantity);

                    // Update the product quantity in the products table
                    $product->update(['quantity' => $newProductQuantity]);

                    // Update the dispatched quantity in the cart items
                    $cartItem->update(['dispatched_quantity' => $cartItem->quantity]);
                }

                // Commit the transaction
                DB::commit();

                // Notify the user
                $order->user->notify((new DispatchOrderNotification($order)));

                session()->flash('message', 'Order dispatched successfully');
            } catch (\Exception $e) {
                // An error occurred, rollback the transaction
                DB::rollback();

                // Handle the error as needed, e.g., log it or display an error message
                session()->flash('error', 'Failed to dispatch the order. Please try again later.');
            }
        }
    }

    public function cancelOrder($orderId)
    {
        $order = Order::find($orderId);
        if ($order) {
            // Update the order status to "canceled"
            $order->update(['status' => 'canceled']);

            // You can move the order to the "Previous Orders" table if needed, or handle it as per your application's logic.

        }
        session()->flash('message', 'Order canceled successfully');
    }
}