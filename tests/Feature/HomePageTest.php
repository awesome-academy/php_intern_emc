<?php

namespace Tests\Feature;

use App\Models\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_navigate_homepage()
    {
        $response = $this->get(route('home'));

        $response->assertSee(trans('home.new_book'));
        $response->assertSee(trans('home.book_sale'));
        $response->assertSee(trans('home.hot_trend'));
    }

    public function test_user_can_navigate_detail_product_page()
    {
        $product = factory(Product::class)->create();
        $response = $this->get(route('products.show_detail',['id' => $product->id]));

        $response->assertSee($product->name);
        $response->assertSee($product->description);
        $response->assertSee($product->information);
        $response->assertSee($product->stock_amount);
    }
}
