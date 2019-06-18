<?php

namespace Tests\Feature\Client;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class RouteTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->be(factory(User::class)->create());
        $this->withoutExceptionHandling();
    }

    /** @test @dataProvider routeListProvider */
    public function client_routes_gives_200_status_on_given_list($route)
    {
        $response = $this->get($route);
        $response->assertStatus(200);
    }

    public function routeListProvider()
    {
        return [
            ['shopping/products/create']
        ];
    }
}
