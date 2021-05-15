<?php

namespace Tests\Feature\Admin;

use App\Domain\Inventory\Models\Category;
use App\Domain\Users\Enums\Role;
use App\Domain\Users\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class CategoryTest
 *
 * @package Tests\Feature\Admin
 */
class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $user = UserFactory::new()->verified()->create();
        $user->addRole(Role::ADMIN);

        $this->be($user);

        $this->withoutExceptionHandling();
    }

    /** @test */
    public function user_must_be_authenticate_to_add_edit_update_category()
    {
        $category = factory(Category::class)->create();

        $this->get('categories/create')
            ->assertStatus(200);

        $this->get('categories/'.$category->id.'/edit')
            ->assertStatus(200);
    }

    /** @test */
    public function authenticated_user_can_add_category()
    {
        // $this->withoutExceptionHandling();

        $category = factory(Category::class)->make();

        $this->post('categories', $category->toArray())
            ->assertStatus(302);

        $this->post('categories', $category->toArray())
            ->assertRedirect('categories')
            ->assertSessionHas('success');
    }
}
