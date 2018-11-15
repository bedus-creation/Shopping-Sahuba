<?php

namespace App\GraphQL\Fields;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Field;
use Folklore\GraphQL\Support\Facades\GraphQL;


class CategoryProductField extends Field {
    
    protected $attributes = [
		'description' => 'A picture'
    ];

    public function type(){
        return Type::listOf(GraphQL::type('Product'));
    }
    
    public function resolve($root, $args){
        return $root->products;
    }
}