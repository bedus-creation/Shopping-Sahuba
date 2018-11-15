<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use App\GraphQL\Fields\CategoryProductField;

class CategoryType extends BaseType{

    public function fields()
    {
        return [
            'name'=>[
                'type'=>Type::string(),
                'description'=>"Name of Product"
            ],
            'products'=>CategoryProductField::class
        ];
    }

}