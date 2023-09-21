<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Admin extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('components.admin', [
            'non_dispatched_orders' => $this->getNonDispatchedOrders()
        ]);
    }

    private function getNonDispatchedOrders()
    {
        return \App\Models\Order::where('status', '<>', 'complete')->count();
    }
}