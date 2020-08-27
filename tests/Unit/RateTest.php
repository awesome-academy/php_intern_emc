<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RateTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_rate_model_property()
    {
        $rate = new Rate();
        $this->assertEquals([
            'user_id',
            'product_id',
            'rating',
        ], $rate->getFillable());
    }

    public function test_it_belongs_to_user()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();
        $rate = factory(Rate::class)->create([
            'user_id' => $user->id,
            'rating' => rand(1,5),
            'product_id' => $product->id,
        ]);

        $this->assertInstanceOf(User::class, $rate->user);

        $this->assertInstanceOf(BelongsTo::class, $rate->user());
    }

    public function test_it_belongs_to_product()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();
        $rate = factory(Rate::class)->create([
            'user_id' => $user->id,
            'rating' => rand(1,5),
            'product_id' => $product->id,
        ]);

        $this->assertInstanceOf(Product::class, $rate->product);

        $this->assertInstanceOf(BelongsTo::class, $rate->product());
    }
}
