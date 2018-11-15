<?php

namespace App\GraphQL\Fields;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Field;
use Folklore\GraphQL\Support\Facades\GraphQL;


class PriceField extends Field {
    
    protected $attributes = [
		'description' => 'A picture'
    ];

    public function type(){
        return Type::string();
    }
    
    public function resolve($root, $args){
        return 'Rs.'.$root->price->min;
    }
}