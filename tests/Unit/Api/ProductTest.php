<?php

namespace Tests\Unit\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase; 

    /** @test */
    public function response_has_products()
    {
        $this->json("GET","graphql?query={products{id,name,price,images{url}}}")
            ->assertJsonStructure([
                'data'=>[
                    'products'
                ]
            ]);
    }

    /** @test */
    public function categories_response_to_list_of_products(){
        $this->json("GET","graphql?query={categories{name,products{id,name,price,images{url}}}}")
            ->assertJsonStructure([
                'data'=>[
                    'categories'
                ]
            ]);
    }
}
