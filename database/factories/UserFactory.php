<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'full_name' => $faker->name,
        'email' => $faker->safeEmail,
        'birthday' => '2000-12-26',
        'address' => $faker->address,
        'phone_number' => '0888999043',
        'gender' => random_int(0,1),
        'password' => Hash::make('123456789'),
        'role' => 0,
    ];
});
