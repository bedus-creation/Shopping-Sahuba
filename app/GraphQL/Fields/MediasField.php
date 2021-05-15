<?php

namespace App\GraphQL\Fields;

use Folklore\GraphQL\Support\Facades\GraphQL;
use Folklore\GraphQL\Support\Field;
use GraphQL\Type\Definition\Type;

class MediasField extends Field
{
    protected $attributes = [
        'description' => 'A picture',
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Media'));
    }
    
    public function resolve($root, $args)
    {
        return $root->medias;
    }
}
