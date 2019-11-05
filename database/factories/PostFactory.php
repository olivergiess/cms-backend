<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        'title'       => $faker->sentence(2),
        'cover_image' => $faker->imageUrl(),
        'body'        => $faker->text(1000),
        'publish_at'  => $faker->date('Y-m-d', '+1 month'),
        'user_id'     => App\Models\User::all()->random()->id,
    ];
});
