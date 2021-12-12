<?php

namespace Database\Seeders;

use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;

/**
 * Class ProductSeeder
 *
 * @package Database\Seeders
 */
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = ProductFactory::new()->count(20)->create();

        foreach ($products as $item) {
            $medias = factory('App\Domain\Base\Models\Media', rand(1, 5))->create();
            $item->medias()->attach($medias);
        }

    }
}
