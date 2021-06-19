<?php

namespace App\GraphQL\Type;

use App\GraphQL\Fields\MediaUrlField;
use Folklore\GraphQL\Support\Type as BaseType;

class MediaType extends BaseType
{
    public function fields()
    {
        return [
            'url' => MediaUrlField::class,
        ];
    }
}
