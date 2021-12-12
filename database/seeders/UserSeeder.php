<?php

namespace Database\Seeders;

use App\Domain\Users\Enums\Role;
use App\Domain\Users\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdminUser();

        $this->createShopUser();
    }

    private function createAdminUser()
    {
        /** @var User $admin */
        $admin = UserFactory::new()->create(['email' => 'admin@sahuba.com']);

        $admin->addRole(Role::ADMIN);
    }

    private function createShopUser()
    {
        /** @var User $user */
        $user = UserFactory::new()->create(['email' => 'shop@sahuba.com']);

        $user->addRole(Role::SHOP);
    }
}
