<?php

namespace App\GraphQL\Type;

use App\GraphQL\Fields\CategoryProductField;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL\Type\Definition\Type;

class CategoryType extends BaseType
{
    public function fields()
    {
        return [
            'name' => [
                'type' => Type::string(),
                'description' => "Name of Product",
            ],
            'products' => CategoryProductField::class,
        ];
    }
}
