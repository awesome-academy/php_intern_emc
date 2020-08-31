<?php

namespace Tests\Unit\Jobs;

use App\Jobs\SendEmailAcceptOrderJob;
use App\Models\Order;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SendEmailAcceptOrderJobTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        Queue::fake();

        $order = factory(Order::class)->create([
            'total_price' => 100000,
            'user_id' => 1,
            'status' => 1,
        ]);
        SendEmailAcceptOrderJob::dispatch($order->user, $order);

        Queue::assertPushed(SendEmailAcceptOrderJob::class);
    }
}
