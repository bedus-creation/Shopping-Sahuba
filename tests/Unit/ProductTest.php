<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_edit_product()
    {

        $this->withoutExceptionHandling();
        $user = factory('App\User')->create(['email_verified_at' => now()]);
        $this->be($user);

        $product = factory('App\Models\Product')->create([
            'user_id' => auth()->user()->id
        ]);

        $this->get('/shopping/products/' . $product->id . '/edit')
            ->assertStatus(200);
    }

    /** @test */
    public function only_product_owner_can_edit_the_product()
    {

        $user = factory('App\User')->create(['email_verified_at' => now()]);

        $this->be($user);

        $product1 = factory('App\Models\Product')->create([
            'user_id' => factory('App\User')->create()->id
        ]);


        $product2 = factory('App\Models\Product')->create(['user_id' => auth()->user()->id]);


        $this->get('/shopping/products/' . $product1->id . '/edit')
            ->assertStatus(403);

        $this->get('/shopping/products/' . $product2->id . '/edit')
            ->assertStatus(200)
            ->assertSee($product2->name)
            ->assertSee($product2->details);
    }


    /** @test */
    public function product_can_be_deleted()
    {
        // $this->withoutExceptionHandling();
        $user = factory('App\User')->create(['email_verified_at' => now()]);
        $this->be($user);
        $product1 = factory('App\Models\Product')->create([
            'user_id' => auth()->user()->id
        ]);
        $product2 = factory('App\Models\Product')->create([
            'user_id' => factory('App\User')->create()->id
        ]);


        $this->call('DELETE', '/shopping/products/' . $product1->id)
            ->assertSessionHas('success');

        $this->call('DELETE', '/shopping/products/' . $product2->id)
            ->assertStatus(403)
            ->assertSessionMissing('success');
    }
}
