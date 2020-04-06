<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Meal;
use Faker\Generator as Faker;

$factory->define(Meal::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'photo' => $faker->imageUrl,
        'description' => $faker->sentence,
        'stock_quantity' => $faker->randomDigitNotNull,
        'buy_price' => $faker->randomFloat(3, 2, 150),
        'sell_price' => $faker->randomFloat(3, 2, 200),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
