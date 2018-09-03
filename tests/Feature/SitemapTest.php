<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SitemapTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function sitemap_test()
    {
        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
    }
}
