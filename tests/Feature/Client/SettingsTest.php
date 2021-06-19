<?php

namespace Tests\Feature\Client;

use App\Domain\Users\Enums\Role;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class SettingsTest
 *
 * @package Tests\Feature\Client
 */
class SettingsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $user = UserFactory::new()->verified()->create();
        $user->addRole(Role::SHOP);

        $this->be($user);

        $this->withoutExceptionHandling();
    }
}
