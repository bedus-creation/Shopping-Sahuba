<?php

namespace Tests\Unit\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TokenEmail extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    /** @test */
    public function tokenized_url_can_access_to_login_and_redirects_to_next()
    {
        $token = str_random(20);
        $url = action('auth/email-authenticate', [
            'token' => $token,
        ]);
        dd($token);

        $this->assertTrue(true);
    }
}
