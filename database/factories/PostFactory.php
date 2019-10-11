<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
		'title'      => $faker->words(2),
        'body'       => $faker->text,
        'publish_at' => $faker->date('Y-m-d', '+1 month'),
        'user_id'    => App\Models\User::all()->random()->id,
    ];
});
