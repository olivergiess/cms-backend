<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
		'first_name' => $faker->firstName,
		'last_name'  => $faker->lastName,
		'email'      => $faker->email,
        'slug'       => $faker->word,
		'password'   => Hash::make('password'),
    ];
});
