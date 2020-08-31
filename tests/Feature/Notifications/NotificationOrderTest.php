<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderStatus;
use Mockery;

class NotificationOrderTest extends TestCase
{
    protected $orderMock;

    public function setUp(): void
    {
        parent::setUp();
        $this->orderMock = Mockery::mock($this->app->make(OrderRepositoryInterface::class));
    }

    public function test_notification_order()
    {
        Notification::fake();

        $order = $this->orderMock->find(310);

        $order->user->notify(new OrderStatus($order));

        Notification::assertSentTo($order->user, OrderStatus::class);
    }
}
