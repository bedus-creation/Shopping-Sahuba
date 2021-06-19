<?php

namespace Database\Factories;

use App\Domain\Inventory\Models\Product;
use App\Models\Price;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

//$factory->define(Price::class, function (Faker $faker) {
//    return [
//        'type' => 'fixed',
//        'min'  => rand(100, 1000),
//    ];
//});

/**
 * Class ProductFactory
 *
 * @package Database\Factories
 */
class ProductFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Product::class;

    /**
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->sentence,
            'category_id' => rand(0, 12),
            'expiry_date' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = '1 months', $timezone = 'Asia/Kathmandu'),
            'user_id'     => UserFactory::new()->create()->id,
            'details'     => $this->faker->paragraph,
            'price_id'    => PriceFactory::new()->create()
        ];
    }

    public function currentUser()
    {
        return $this->state(function (array $attributes) {
            return [
                'user_id' => auth()->user()->getAuthIdentifier(),
            ];
        });
    }
}
