<?php

namespace Database\Factories;

use App\Domain\Inventory\Models\Price;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class PriceFactory
 *
 * @package Database\Factories
 */
class PriceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Price::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => 'fixed',
            'min'  => rand(100, 1000),
        ];
    }
}
