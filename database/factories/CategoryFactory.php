<?php

use Faker\Generator as Faker;
use App\Domain\Inventory\Models\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'=>$faker->word
    ];
});
