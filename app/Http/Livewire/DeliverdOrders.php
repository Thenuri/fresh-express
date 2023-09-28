<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class DeliverdOrders extends Component
{
    public function render()
    {   $previousOrders = Order::where('delivery_status', 'deliverd')
        ->with('customer')->get();
        return view('livewire.deliverd-orders',[
            'previousOrders' => $previousOrders,
        ]);
    }
}
