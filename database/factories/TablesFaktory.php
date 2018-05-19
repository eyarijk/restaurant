<?php

use Faker\Generator as Faker;

$factory->define(App\Table::class, function (Faker $faker) {
    return [
        'person_size' => $faker->numberBetween(2, 5),
        'number' => $faker->unique()->numberBetween(1, 50),
        'description' => $faker->text,
        'reserve_price' => $faker->numberBetween(1000, 5000),
        'is_reserved' => $faker->numberBetween(0, 1),
    ];
});
