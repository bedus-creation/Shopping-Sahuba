<?php

namespace Tests\Feature\Client\Traits;

use App\Domain\Users\Enums\Role;
use App\Domain\Users\Models\User;
use Database\Factories\UserFactory;

trait ClientAuthenticate
{
    public function clientAuthenticate(?User $user = null)
    {
        $user = $user ?? UserFactory::new()->verified()->create();
        $user->addRole(Role::SHOP);

        $this->be($user);
    }
}
