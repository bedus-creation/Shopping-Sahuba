<?php

namespace Database\Factories;

use App\Domain\Inventory\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Category::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
