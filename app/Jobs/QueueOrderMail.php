<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class QueueOrderMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $productsOrder;
    protected $total;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $productsOrder, $total)
    {
        $this->email = $email;
        $this->productsOrder = $productsOrder;
        $this->total = $total;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $content = [
            'products' => $this->productsOrder,
            'total' => $this->total,
        ];
        Mail::to($this->email)->send(new OrderMail($content));
    }
}
