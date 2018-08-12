<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products=factory('App\Models\Product',20)->create();

        foreach($products as $item){
            $medias = factory('App\Models\Media',rand(1,5))->create();
            $item->medias()->attach($medias);
        }

    }
}
