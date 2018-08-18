<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Price::class,function(Faker $faker){
    return [
        'type'=>'fixed',
        'min'=>rand(100,1000)
    ];
});

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->sentence,
        'category_id'=>rand(0,12),
        'expiry_date'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = '1 months', $timezone = 'Asia/Kathmandu'), 
        'price_id'=>rand(0,1),
        'user_id'=>function(){
            return App\User::inRandomOrder()->first()->id;
        },
        'details'=>$faker->paragraph,
        'price_id'=>function(){
            return factory('App\Models\Price')->create()->id;
        }
    ];
});
