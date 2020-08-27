<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_product_model_property()
    {
        $product = new Product();
        $this->assertEquals([
            'name',
            'description',
            'information',
            'image',
            'stock_amount',
            'price',
            'discount',
            'category_id',
        ], $product->getFillable());
    }

    public function test_it_has_many_comments()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();
        $comment = factory(Comment::class)->create([
            'user_id' => $user->id,
            'content' => 'content comments',
            'product_id' => $product->id,
        ]);

        $this->assertTrue($product->comments->contains($comment));

        $this->assertInstanceOf(HasMany::class, $product->comments());
    }

    public function test_it_has_many_rates()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();
        $rate = factory(Rate::class)->create([
            'user_id' => $user->id,
            'rating' => random_int(1, 5),
            'product_id' => $product->id,
        ]);

        $this->assertTrue($product->rates->contains($rate));

        $this->assertInstanceOf(HasMany::class, $product->rates());
    }

    public function test_it_belongs_to_category()
    {
        $category = factory(Category::class)->create([
            'name' => 'Ebook Test',
        ]);
        $product = factory(Product::class)->create([
            'category_id' => $category->id,
        ]);

        $this->assertInstanceOf(Category::class, $product->category);

        $this->assertInstanceOf(BelongsTo::class, $product->category());
    }

    public function test_it_belongs_to_many_orders()
    {
        $product = factory(Product::class)->create();
        $user = factory(User::class)->create();
        $order = factory(Order::class)->create([
            'total_price' => 100000,
            'user_id' => $user->id,
            'status' => 0,
        ]);

        $this->assertInstanceOf(BelongsToMany::class, $product->orders());
    }
}
