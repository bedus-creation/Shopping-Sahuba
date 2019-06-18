<?php

namespace Tests\Unit\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Utils\Role;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    /** @test */
    public function shopping_user_can_be_loggegned_into_system()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function role_is_created_when_user_signUp()
    {
        $user = factory(User::class)->make();

        $data = array_merge($user->toArray(), [
            "password" => "secret",
            "password_confirmation" => "secret"
        ]);

        $this->post("register", $data);

        $this->assertDatabaseHas("users", $user->toArray());

        $this->assertTrue(count(Role::all()) == 1);
    }

    /** @test */
    public function when_login_user_is_redirected_to_path_in_role_config_file()
    {
        $role = "shop";
        $data = ["email" => "tmgbedu@gmail.com"];
        $user = createUser($data, "shop");
        $path = config('roles.' . $role . ".path");
        $this->post("login", array_merge($data, ["password" => "secret"]))
            ->assertRedirect($path);
    }
}
