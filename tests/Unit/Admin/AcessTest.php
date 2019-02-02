<?php

namespace Tests\Unit\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class AccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_url_only_access_by_admin()
    {
        $this->withoutExceptionHandling();

        $this->be(createUser([], "admin"));

        $this->get('admin')
            ->assertStatus(200);

        auth()->logout();

        $this->be(factory(User::class)->create());
        
        $this->get('admin')
            ->assertStatus(401);
    }
}
