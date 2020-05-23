<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    $g = ['women', 'men'];
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('mbyamphu1991'), // secret
        'remember_token' => str_random(10)
    ];
});
