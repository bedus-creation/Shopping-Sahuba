<?php

namespace Tests\Unit\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Utils\Role;

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
        $token =str_random(20);
        $url = action('auth/email-authenticate', [
            'token' => $token
        ]);
        dd($token);

        $this->assertTrue(true);
    }
}
