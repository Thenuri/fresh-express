<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Auth;
use DB;
use Livewire\Component;

class Driver extends Component
{

    public $driverOrders;

    public function mount()
    {
        $user = Auth::user();
        $this->driverOrders = $user->driverOrdersWithCustomerDetails();
    }
    public function render()
    {   
        $newOrders = Order::where('delivery_status', 'pending')
        ->with('customer');
       
        $previousOrders = Order::where('delivery_status', 'deliverd')
        ->with('customer')->get();
        return view('livewire.driver',[
            'driverOrders' => $this->driverOrders,
            'previousOrders' => $previousOrders,
            'newOrders' => $newOrders,
            
           

        ]);
    }

    public function deliver($orderId)
    {
        
    // Find the order
        $order = Order::find($orderId);

        if ($order) {

            // Update the status of the order to "completed" or any other status you use to indicate completed orders
            $order->update(['delivery_status' => 'deliverd']);

            // Optionally, you can also update the driver_status column if needed
            // $order->update(['driver_status' => 'delivered']);
            
            // You can add any additional logic here, such as sending notifications or updating related records

            // Refresh the driverOrders list to remove the delivered order
            // $this->driverOrders = Auth::user()->driverOrdersWithCustomerDetails();
            $this->driverOrders= $this->driverOrders->reject(function ($item) use ($orderId) {
                return $item->id === $orderId;
            });
            // Flash a success message
            session()->flash('message', 'Order delivered successfully');
        } else {
            // Handle the case when the order is not found
            session()->flash('error', 'Order not found');
        }
    }
}
