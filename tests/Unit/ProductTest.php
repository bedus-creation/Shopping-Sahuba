<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function login_user_can_view_all_their_records(){

        $this->be(factory('App\User')->create());

        $this->get('/shopping/products')
            ->assertStatus(200);

    }
    
    /** @test */
    public function login_user_can_get_create_product_form()
    {
        $user=factory('App\User')->create();

        $this->be($user);

        $this->get('/shopping/products/create')
            ->assertStatus(200);
    }

    /** @test */
    public function authenticated_user_can_edit_product(){

        $this->withoutExceptionHandling();

        $user=factory('App\User')->create();

        $this->be($user);

        $product=factory('App\Models\Product')->create([
            'user_id'=>auth()->user()->id
        ]);

        $this->get('/shopping/products/'.$product->id.'/edit')
            ->assertStatus(200);

    }

    /** @test */
    public function only_product_owner_can_edit_the_product(){

        $user=factory('App\User')->create();

        $this->be($user);

        $product1=factory('App\Models\Product')->create([
            'user_id'=>factory('App\User')->create()->id
        ]);

        $this->get('/shopping/products/'.$product1->id.'/edit')
            ->assertStatus(403);

        $product2=factory('App\Models\Product')->create(['user_id'=>auth()->user()->id]);

        $this->get('/shopping/products/'.$product2->id.'/edit')
            ->assertStatus(200);
    } 


    /** @test */
    public function unauthenticated_user_cannot_access_product_form(){

        $this->get('/shopping/products/create')
            ->assertStatus(500);
    }
}
