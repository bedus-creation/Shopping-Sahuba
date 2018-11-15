<?php

namespace App\GraphQL\Fields;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Field;
use Folklore\GraphQL\Support\Facades\GraphQL;


class MediaUrlField extends Field {
    
    protected $attributes = [
		'description' => 'A picture Url'
    ];

    public function args()
	{
		return [
			'type' => [
				'type' => Type::string(),
				'description' => 'Quality of the picture'
            ]
		];
	}

    public function type(){
        return Type::string();
    }
    
    public function resolve($root, $args){
        return $root->base_url.json_decode($root->in_json)->images->small;
    }
}