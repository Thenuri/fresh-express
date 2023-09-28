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
        // $users = User::with('loyaltyPoints')->find($this->userId);
        
        // // Fetch orders for the user
        // // $orders = Order::where('user_id', $this->userId)->get();
        // $orders = Order::where('user_id', $this->userId)
        //     ->with('cartItems.product') // Assuming you have a relationship set up in the Order model
        //     ->get();

        // return view('livewire.customer-details', [
        //     'users' => $users,
        //     'orders' => $orders
        // ]);'


        // Find the user by ID
        $users = User::with('loyaltyPoints')->find($this->userId);

        if (!$users) {
            // Handle the case when the user is not found
            abort(404); // You can customize the error response as needed
        }

        // Calculate the total loyalty points for this user
        $totalLoyaltyPoints = $users->loyaltyPoints->sum('points');

        // Fetch orders for the user
        $orders = Order::where('user_id', $this->userId)
            ->with('cartItems.product') // Assuming you have a relationship set up in the Order model
            ->get();

        return view('livewire.customer-details', [
            'users' => $users,
            'orders' => $orders,
            'totalLoyaltyPoints' => $totalLoyaltyPoints,
        ]);
    }

   
}


