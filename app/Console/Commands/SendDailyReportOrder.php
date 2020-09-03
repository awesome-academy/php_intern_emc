<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\Eloquent\OrderRepository;
use Illuminate\Support\Facades\Mail;
use App\Mail\DailyReportOrderMail;

class SendDailyReportOrder extends Command
{
    protected $orderRepository;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dailyReport:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send total order on every day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(OrderRepository $orderRepository)
    {
        parent::__construct();
        $this->orderRepository = $orderRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $total = $this->orderRepository->totalOrderOneDay();
        Mail::to(config('setting.admin_mail'))->send(new DailyReportOrderMail($total));
    }
}
