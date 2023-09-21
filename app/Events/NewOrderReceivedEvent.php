<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewOrderReceivedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order_count;

    /**
     * Create a new event instance.
     */
    public function __construct(?int $count = null)
    {
        $this->order_count = $count ? $count : \App\Models\Order::where('status', '<>', 'complete')->count();
    }

    public function broadcastOn()
    {
        return ['fresh-express-orders'];
    }

    public function broadcastAs()
    {
        return 'new-order-received';
    }
}