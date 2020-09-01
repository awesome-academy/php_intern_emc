<?php

namespace App\Console\Commands;

use App\Mail\SendTotalOrderWeek;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use DateTime;

class SendEmailTotalOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:send_email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send total order on friday every week';
#
    /**
     * Create a new command instance.
     *
     * @return void
     */
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $friday_date = date('Y-m-d');
        $friday = DateTime::createFromFormat('Y-m-d', $friday_date);
        $totalOrder = $this->orderRepository->sumOrderAtWeekend($friday);

        Mail::to(config('setting.admin_mail'))->send(new SendTotalOrderWeek($totalOrder));
    }
}
