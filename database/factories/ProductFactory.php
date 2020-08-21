<?php

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_id' => $faker->randomNumber,
        'slug' => $faker->slug,
        'created_by' => $faker->uuid,
        'updated_by' => $faker->uuid
    ];
});
