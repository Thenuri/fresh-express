<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DispatchOrderNotification extends Notification
{
    use Queueable;

    public $order;

    /**
     * Create a new notification instance.
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $order = $this->order;

        $items = $order->cartItems; // Assuming you have a cartItems relationship
        $deliveryFee = 50;
        $content = (new MailMessage)
            ->subject('Dispatched Order')
            ->line('Your order has been dispatched. Here are the details:')
            ->line('Order Number: ' . $order->order_number)
            ->line('Total Price: LKR' . $order->total)
            ->line('Delivery Fee: LKR' . $deliveryFee)
            ->line('Purchased Products:')
            ->line('---------------------')
            ->line('Product Name | Quantity')
            ->line('---------------------');

        foreach ($items as $item) {
            $content->line($item->product->name . ' | Quantity: ' . $item->quantity );
        }

        $loyaltyPoints = $order->customer->loyaltyPoints; // Assuming you have a loyaltyPoints relationship

        $content->line('---------------------')
            ->action('View Order', url('/'))
            ->line('Thank you for using our application!');

        return $content;
    }

    // private function addItemToMail($cartItem)
    // {
    //     $this->line($cartItem->product->name . ' | ' . $cartItem->quantity . ' | $' . $cartItem->price);
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'order_id' => $this->order->id,
            'total' => $this->order->total,
        ];
    }
}