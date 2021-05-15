<?php

namespace App\GraphQL\Query;

use App\Models\Category;
use Folklore\GraphQL\Support\Facades\GraphQL;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type;

class CategoriesQuery extends Query
{
    protected $attributes = [
        'name' => 'categories',
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Category'));
    }

    public function args()
    {
    }

    public function resolve($root, $args)
    {
        return Category::with('products')->get();
    }
}
