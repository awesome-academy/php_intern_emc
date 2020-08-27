<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\Eloquent\UserRepository;
use Faker\Factory as Faker;

class OrderTest extends TestCase
{
    protected $userRepository;
    protected $order;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userRepository = new UserRepository();
        $this->user = factory(User::class)->create();
        $this->order = factory(Order::class)->create([
            'user_id' => $this->user->id,
            'total_price' => rand(10000, 100000),
            'status' => 0,
        ]);
    }

    protected function tearDown(): void
    {
        $this->userRepository->delete($this->user->id);
    }

    public function test_order_has_many_product_order()
    {
        $orderProduct = factory(ProductOrder::class)->create([
            'product_id' => Product::all()[rand(1, Product::all()->count() - 1)]->id,
            'order_id' => $this->order->id,
            'quantity' => 1,
            'price' => 20000,
        ]);

        $this->assertTrue($this->order->productOrders->contains($orderProduct));
    }

    public function test_order_belongs_to_user()
    {
        $this->assertInstanceOf(User::class, $this->order->user);
    }

    public function test_order_belongs_to_many_product()
    {
        $this->assertEquals('order_id', $this->order->products()->getForeignPivotKeyName());
        $this->assertEquals('product_id', $this->order->products()->getRelatedPivotKeyName());
    }

}
