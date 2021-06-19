<?php

namespace Tests\Feature\Client;

use App\Domain\Users\Enums\Role;
use Database\Factories\ProductFactory;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class ProductTest
 *
 * @package Tests\Feature\Client
 */
class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $user = UserFactory::new()->verified()->create();
        $user->addRole(Role::SHOP);

        $this->be($user);

        $this->withoutExceptionHandling();
    }

    /** @test */
    public function authenticated_user_can_edit_product()
    {
        $product = ProductFactory::new()->create([
            'user_id' => auth()->user()->id,
        ]);

        $this->get('/shopping/products/'.$product->id.'/edit')
            ->assertStatus(200);
    }

    /** @test */
    public function only_product_owner_can_edit_the_product()
    {
        $this->withExceptionHandling();

        $product1 = ProductFactory::new()->create();

        $product2 = ProductFactory::new()->currentUser()->create();

        $this->get('/shopping/products/'.$product1->id.'/edit')
            ->assertStatus(403);

        $this->get('/shopping/products/'.$product2->id.'/edit')
            ->assertStatus(200)
            ->assertSee($product2->name)
            ->assertSee($product2->details);
    }


    /** @test */
    public function product_can_be_deleted()
    {
        $this->withExceptionHandling();

        $product1 = ProductFactory::new()->currentUser()->create();

        $product2 = ProductFactory::new()->create();

        $this->call('DELETE', '/shopping/products/'.$product1->id)
            ->assertSessionHas('success');

        $this->call('DELETE', '/shopping/products/'.$product2->id)
            ->assertStatus(403)
            ->assertSessionMissing('success');
    }
}
