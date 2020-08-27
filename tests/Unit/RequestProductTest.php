<?php

namespace Tests\Unit\Models;

use App\Models\RequestProduct;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RequestProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_request_product_model_property()
    {
        $requestProduct = new RequestProduct();
        $this->assertEquals([
            'user_id',
            'product_name',
            'description',
            'image',
            'status',
        ], $requestProduct->getFillable());
    }

    public function test_it_belong_to_user()
    {
        $user = factory(User::class)->create();
        $requestProduct = factory(RequestProduct::class)->create([
            'user_id' => $user->id,
            'product_name' => 'Test Product',
            'description' => 'Test Description',
            'image' => '1.jpg',
            'status' => 0,
        ]);
        $this->assertInstanceOf(User::class, $requestProduct->user);

        $this->assertInstanceOf(BelongsTo::class, $requestProduct->user());
    }
}
