<?php

use Faker\Generator as Faker;

$factory->define(App\Place::class, function (Faker $faker) {
    $name = $faker->company;
    $slug = str_slug($name);

    return [
        'name' => $name,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'description' => $faker->text,
        'logo' => public_path('storage/blank_image.jpg'),
        'slug' => $slug
    ];
});
