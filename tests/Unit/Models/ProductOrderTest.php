<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\Eloquent\OrderRepository;

class ProductOrderTest extends TestCase
{
    protected $orderRepository;
    protected $order;
    protected $productOrder;

    protected function setUp(): void
    {
        parent::setUp();
        $this->orderRepository = new OrderRepository();
        $this->order = factory(Order::class)->create([
            'user_id' => User::all()[rand(1, User::all()->count() - 1)]->id,
            'total_price' => rand(10000, 100000),
            'status' => 0,
        ]);
        $this->productOrder = factory(ProductOrder::class)->create([
            'product_id' => Product::all()[rand(1, Product::all()->count() - 1)]->id,
            'order_id' => $this->order->id,
            'quantity' => 1,
            'price' => rand(20000, 70000),
        ]); 
    }

    protected function tearDown(): void
    {
        $this->orderRepository->delete($this->order->id);
    }

    public function test_create_product_order()
    {
        $this->assertDatabaseHas('product_orders', $this->productOrder->toArray());
    }

    public function test_product_order_belongs_to_order()
    {
        $this->assertInstanceOf(Order::class, $this->productOrder->order);
    }
}
