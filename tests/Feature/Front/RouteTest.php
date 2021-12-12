<?php

namespace Tests\Feature\Front;

use Database\Factories\ProductFactory;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Front\Traits\RouteDataProvider;
use Tests\TestCase;

/**
 * Class RouteTest
 *
 * @package Tests\Feature
 */
class RouteTest extends TestCase
{
    use RefreshDatabase;
    use RouteDataProvider;

    public function setUp(): void
    {
        parent::setUp();

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

    /** @test */
    public function public_can_access_product_details()
    {
        $product = ProductFactory::new()->create();

        $this->get($product->product_link())
            ->assertStatus(200);
    }

    /** @test */
    public function public_can_access_shop_details()
    {
        $product = UserFactory::new()->create();

        $this->get($product->profile_link())
            ->assertStatus(200);
    }
}
