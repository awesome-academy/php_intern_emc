<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DailyReportOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $quantity;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'))
            ->markdown('mails.dailyReportOrder')
            ->subject(trans('home.mail.subject_mail_report_daily') .date('d-m-Y'))
            ->with('quantity', $this->quantity);
    }
}
