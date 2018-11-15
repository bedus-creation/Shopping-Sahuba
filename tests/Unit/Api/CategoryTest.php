<?php

namespace Tests\Unit\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
