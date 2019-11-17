<?php

use Faker\Generator as Faker;

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
		'first_name' => $faker->firstName,
		'last_name'  => $faker->lastName,
		'email'      => $faker->email,
		'password'   => Hash::make('password'),
    ];
});
