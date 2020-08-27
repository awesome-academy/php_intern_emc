<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'description' => $faker->sentence(3),
        'information' => $faker->sentence(3),
        'image' => 'image_195509_1_41275.jpg',
        'stock_amount' => random_int(10,15),
        'price' => random_int(50000,100000),
        'discount'=> random_int(0,50),
        'category_id'=> random_int(1,5),
    ];
});
