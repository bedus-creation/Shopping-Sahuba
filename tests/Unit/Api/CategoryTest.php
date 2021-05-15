<?php

namespace Tests\Unit\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testExample()
    {
        $this->get("graphql?query=categoies{{products{id,name,price,images{url}}}}")
            ->assertJsonMissing(["errors"]);
    }
}
