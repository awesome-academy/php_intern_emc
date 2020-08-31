<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Jobs\QueueOrderMail;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;

class OrderMailTest extends TestCase
{
    public function test_send_mail_order()
    {
        Queue::fake();

        QueueOrderMail::dispatch('khanh26122000@gmail.com', [], 200);

        Queue::assertPushed(QueueOrderMail::class);
    }
}
