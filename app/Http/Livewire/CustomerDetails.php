<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class CustomerDetails extends Component
{
    public $userId;
    public $cart_id;

    public function render()
    {
        $users = User::find($this->userId);
        
        // Fetch orders for the user
        // $orders = Order::where('user_id', $this->userId)->get();
        $orders = Order::where('user_id', $this->userId)
            ->with('cartItems.product') // Assuming you have a relationship set up in the Order model
            ->get();

        return view('livewire.customer-details', [
            'users' => $users,
            'orders' => $orders
        ]);
    }
}


