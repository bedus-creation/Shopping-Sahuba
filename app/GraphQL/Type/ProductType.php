<?php

namespace App\GraphQL\Type;

use App\GraphQL\Fields\MediasField;
use App\GraphQL\Fields\PriceField;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL\Type\Definition\Type;

class ProductType extends BaseType
{
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => "Id's of products",
            ],
            'name' => [
                'type' => Type::string(),
                'description' => "Name of Product",
            ],
            'details' => [
                'type' => Type::string(),
                'description' => "Details of the Products",
            ],
            'price' => PriceField::class,
            'images' => MediasField::class,
        ];
    }
}
