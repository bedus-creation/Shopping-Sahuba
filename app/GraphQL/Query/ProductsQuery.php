<?php

namespace App\GraphQL\Query;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Facades\GraphQL;
use App\Models\Product;

class ProductsQuery extends Query{

    protected $attributes = [
        'name' => 'products'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Product'));
    }

    public function args(){
        return [
            'id'=>['name'=>'id','type'=>Type::int()],
        ];
    }

    public function resolve($root, $args){

        if (isset($args['id'])) {
            return Product::where('id',$args['id'])->get();
        }
         
        return Product::with('medias')->with('price')->get();
    }
}