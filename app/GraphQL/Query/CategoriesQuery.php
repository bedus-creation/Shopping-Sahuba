<?php

namespace App\GraphQL\Query;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use Folklore\GraphQL\Support\Facades\GraphQL;
use App\Models\Category;

class CategoriesQuery extends Query{
    
    protected $attributes = [
        'name' => 'categories'
    ];

    public function type(){
        return Type::listOf(GraphQL::type('Category'));
    }

    public function args(){

    }

    public function resolve($root, $args){
        return Category::with('products')->get();
    }
}