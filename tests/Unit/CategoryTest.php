<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Models\Category;

class CategoryTest extends TestCase
{
   
    use RefreshDatabase;

    /** @test */
    public function user_must_be_authenticate_to_add_edit_update_category(){

        $this->get('categories/create')
            ->assertStatus(302);

        $category= factory(Category::class)->create();

        $this->get('categories/'.$category->id.'/edit')
            ->assertStatus(302);

        $this->be(factory(User::class)->create());

        $this->get('categories/create')
            ->assertStatus(200);
        
        $this->get('categories/'.$category->id.'/edit')
            ->assertStatus(200);

    }

    /** @test */
    public function authenticated_user_can_add_category(){

        // $this->withoutExceptionHandling();

        $category= factory(Category::class)->make();

        $this->post('categories',$category->toArray())
            ->assertStatus(302);
        
        $this->be(factory(User::class)->create());

        $this->post('categories',$category->toArray())
            ->assertRedirect('categories')
            ->assertSessionHas('success');

    }
}
