<?php

namespace App\Notifications;

use App\Models\RequestProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RequestProductStatus extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $requestProduct;

    public function __construct(RequestProduct $requestProduct)
    {
        $this->requestProduct = $requestProduct;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'request_id' => $this->requestProduct->id,
            'product_name' => $this->requestProduct->product_name,
            'status' => $this->requestProduct->status['status'],
            'color' => $this->requestProduct->status['color'],
        ];
    }
}
