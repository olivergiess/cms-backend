<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Blog::class, function (Faker $faker) {
    return [
        'url_identifier' => $faker->word,
        'name'           => $faker->sentence(2),
        'cover_image'    => $faker->imageUrl(),
        'about'          => $faker->text(1000),
        'user_id'        => App\Models\User::all()->random()->id,
    ];
});
