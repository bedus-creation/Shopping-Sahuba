<?php

namespace Tests\Feature\Client\Traits;

/**
 * Trait RouteDataProvider
 *
 * @package Tests\Feature\Client\Traits
 */
trait RouteDataProvider
{
    public function routeListProvider(): array
    {
        return [
            ['shopping/products'],
            ['shopping/products/create'],

            ['shopping/settings'],
        ];
    }
}
