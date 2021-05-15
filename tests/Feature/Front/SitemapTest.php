<?php

namespace Tests\Feature\Front;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class SitemapTest
 *
 * @package Tests\Feature\Front
 */
class SitemapTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function sitemap_test()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
    }
}
