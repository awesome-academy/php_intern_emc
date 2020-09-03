<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\Eloquent\OrderRepository;
use Illuminate\Support\Facades\Mail;
use Mockery as M;

class DailyReportOrderTest extends TestCase
{
    protected $orderRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->orderRepository = M::mock(OrderRepository::class);
    }

    public function test_total_order_in_day()
    {
        $this->orderRepository->shouldReceive('totalOrderOneDay')->andReturn(1); 
    }
}
