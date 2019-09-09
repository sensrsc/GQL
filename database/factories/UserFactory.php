<?php

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'user_id' => $faker->uuid,
        'email' => $faker->unique()->safeEmail,
        'password' => hash('sha256', $faker->password),
        'name' => $faker->name,
        'role_id' => $faker->randomNumber(1),
        'mobile' => $faker->phoneNumber,
        'created_by' => $faker->uuid,
        'updated_by' => $faker->uuid
    ];
});
