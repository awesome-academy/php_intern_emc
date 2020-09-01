<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTotalOrderWeek extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $totalOrder;

    public function __construct($totalOrder)
    {
        $this->totalOrder = $totalOrder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'))
        ->markdown('emails.total_order_week')
        ->subject(trans('home.mail.subject_order') .date('d-m-Y'))
        ->with('total_order', $this->totalOrder);
    }
}
