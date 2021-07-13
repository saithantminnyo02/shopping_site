<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->numerify('Product ##'),
        'description' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'quantity' => $faker->numberBetween($min = 1, $max = 1000),
        'price' => $faker->numberBetween($min = 500, $max = 100000),
        'photo_name' => "suzy1.jpeg"
    ];
});
