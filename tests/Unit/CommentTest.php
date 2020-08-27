<?php

namespace Tests\Unit;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_comment_model_property()
    {
        $comment = new Comment();
        $this->assertEquals([
            'user_id',
            'product_id',
            'content',
            'parent_id',
        ], $comment->getFillable());
    }

    public function test_it_belongs_to_user()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();
        $comment = factory(Comment::class)->create([
            'user_id' => $user->id,
            'content' => 'Test content',
            'product_id' => $product->id,
        ]);

        $this->assertInstanceOf(User::class, $comment->user);

        $this->assertInstanceOf(BelongsTo::class, $comment->user());
    }

    public function test_it_belongs_to_product()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();
        $comment = factory(Comment::class)->create([
            'user_id' => $user->id,
            'content' => 'Test content',
            'product_id' => $product->id,
        ]);

        $this->assertInstanceOf(Product::class, $comment->product);

        $this->assertInstanceOf(BelongsTo::class, $comment->product());
    }
}
