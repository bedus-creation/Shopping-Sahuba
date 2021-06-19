<?php

namespace Tests\Feature\Client;

use App\Domain\Users\Enums\Role;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Client\Traits\RouteDataProvider;
use Tests\TestCase;

/**
 * Class RouteTest
 *
 * @package Tests\Feature\Client
 */
class RouteTest extends TestCase
{
    use RefreshDatabase;
    use RouteDataProvider;

    public function setUp(): void
    {
        parent::setUp();

        $user = UserFactory::new()->verified()->create();
        $user->addRole(Role::SHOP);

        $this->be($user);

        $this->withoutExceptionHandling();
    }

    /**
     * @dataProvider routeListProvider
     *
     * @test
     */
    public function client_routes_gives_200_status_on_given_list($route)
    {
        $response = $this->get($route);

        $response->assertStatus(200);
    }
}
