<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
    use RefreshDatabase; 

    /** @test */
    public function authenticated_user_can_comment_on_products()
    {
        $this->assertTrue(true);
    }
}
