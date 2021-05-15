<?php

namespace Tests\Unit\Admin;

use Aammui\RolePermission\Exception\RoleDoesNotExistException;
use App\Domain\Users\Enums\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class AccessTest
 *
 * @package Tests\Unit\Admin
 */
class AccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_url_only_access_by_admin()
    {
        $this->withoutExceptionHandling();

        $this->be(createUser(Role::ADMIN));

        $this->get('admin')
            ->assertStatus(200);
    }

    /** @test */
    public function user_with_no_roles_throws_exception()
    {
        $this->withoutExceptionHandling();

        $this->expectException(RoleDoesNotExistException::class);

        $this->be(createUser([]));

        $this->get('admin')
            ->assertStatus(401);
    }
}
