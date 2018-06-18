<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->sentence,
        'cover'=>$faker->imageUrl($width = 640, $height = 480),
        'category_id'=>rand(0,12),
        'expiry_date'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = '1 months', $timezone = 'Asia/Kathmandu'), 
        'price_id'=>rand(0,1),
        'user_id'=>function(){
            return App\User::inRandomOrder()->first()->id;
        }
    ];
});
