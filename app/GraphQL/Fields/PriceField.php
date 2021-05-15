<?php

namespace App\GraphQL\Fields;

use Folklore\GraphQL\Support\Field;
use GraphQL\Type\Definition\Type;

class PriceField extends Field
{
    protected $attributes = [
        'description' => 'A picture',
    ];

    public function type()
    {
        return Type::string();
    }
    
    public function resolve($root, $args)
    {
        return 'Rs.'.$root->price->min;
    }
}
