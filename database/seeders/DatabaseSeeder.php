<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 *
 * @package Database\Seeders
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         factory('App\User')->create([
             'email'=>'tmgbedu@gmail.com',
         ]);

         $this->call(ProductSeeder::class);
    }
}
