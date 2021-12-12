<?php

namespace Tests\Feature\Client;

use App\Core\Abstracts\TableName;
use Database\Factories\CategoryFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\Feature\Client\Traits\ClientAuthenticate;
use Tests\TestCase;

class ProductStoreTest extends TestCase
{
    use RefreshDatabase;
    use ClientAuthenticate;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->clientAuthenticate();
    }

    /** @test */
    public function client_can_add_a_new_product()
    {
        $category = CategoryFactory::new()->create();

        $data = [
            'name' => $this->faker->name,
            'condition' => 0,
            'negotiable' => true,
            'price' => 300,
            "category_id" => $category->id,
        ];

        $this->post(route("products.store"), $data)->assertSessionHasNoErrors();

        $this->assertDatabaseHas(TableName::PRODUCTS, Arr::except($data, ["price"]));
    }
}
