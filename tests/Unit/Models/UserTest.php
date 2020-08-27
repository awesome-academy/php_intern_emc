<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\Comment;
use App\Models\Product;
use App\Models\RequestProduct;
use App\Models\Order;
use App\Models\Rate;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\Eloquent\UserRepository;
use Faker\Factory as Faker;

class UserTest extends TestCase
{
    protected $userRepository;
    protected $user;
    protected $faker;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->userRepository = new UserRepository();
        $this->faker = Faker::create();
    }

    public function tearDown(): void
    {
        $this->userRepository->delete($this->user->id);
    }

    // Test CRUD
    public function test_create_user()
    {
        $this->assertDatabaseHas('users', $this->user->toArray());
    }

    public function test_show_user()
    {
        $foundUser = $this->userRepository->find($this->user->id);

        $this->assertEquals($this->user->username, $foundUser->username);
    }

    public function test_update_user()
    {
        $updateUser = $this->userRepository->update(
            $this->user->id,
            ['full_name' => 'Updated user']
        );

        $this->assertTrue($updateUser);
    }

    // Test relationship User
    public function test_user_has_many_comment()
    {
        $comment = factory(Comment::class)->create([
            'product_id' => Product::all()[rand(1, Product::all()->count() -1)]->id,
            'user_id' => $this->user->id,
            'content' => $this->faker->text,
        ]);

        $this->assertTrue($this->user->comments->contains($comment));
    }

    public function test_user_has_many_request_product()
    {
        $requestProduct = factory(RequestProduct::class)->create([
            'user_id' => $this->user->id,
            'product_name' => $this->faker->name,
            'description' => $this->faker->text,
            'status' => 0
        ]);

        $this->assertTrue($this->user->requestProducts->contains($requestProduct));
    }

    public function test_user_has_many_order()
    {
        $order = factory(Order::class)->create([
            'user_id' => $this->user->id,
            'total_price' => rand(10000, 100000),
            'status' => 0,
        ]);

        $this->assertTrue($this->user->orders->contains($order));
    }

    public function test_user_has_many_rate()
    {
        $rate = factory(Rate::class)->create([
            'user_id' => $this->user->id,
            'product_id' => Product::all()[rand(1, Product::all()->count() - 1)]->id,
            'rating' => rand(1, 5),
        ]);

        $this->assertTrue($this->user->rates->contains($rate));
    }
}
