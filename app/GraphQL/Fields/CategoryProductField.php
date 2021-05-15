<?php

namespace App\GraphQL\Fields;

use Folklore\GraphQL\Support\Facades\GraphQL;
use Folklore\GraphQL\Support\Field;
use GraphQL\Type\Definition\Type;

class CategoryProductField extends Field
{
    protected $attributes = [
        'description' => 'A picture',
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Product'));
    }
    
    public function resolve($root, $args)
    {
        return $root->products;
    }
}
