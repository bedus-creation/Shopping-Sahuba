<?php

namespace Tests\Feature\Front\Traits;

/**
 * Trait RouteDataProvider
 *
 * @package Tests\Feature\Front\Traits
 */
trait RouteDataProvider
{
    public function routeListProvider(): array
    {
        return [
            ['/'],
            ['/search']
        ];
    }
}
