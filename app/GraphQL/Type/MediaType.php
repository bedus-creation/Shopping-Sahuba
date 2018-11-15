<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use App\GraphQL\Fields\MediaUrlField;

class MediaType extends BaseType{
    
    public function fields(){
        return [
            'url'=>MediaUrlField::class
        ];
    }


}