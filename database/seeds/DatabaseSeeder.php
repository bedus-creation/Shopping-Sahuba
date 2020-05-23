<?php

use Illuminate\Database\Seeder;

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
            'email' => 'hamrotalim90@gmail.com',
            'email_verified_at' => now()
        ]);

        // $this->call(ProductSeeder::class);
    }
}
