<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    protected $fillable=[
        'name','condition','negotiable','expiry_date','price_id','user_id','category_id'
    ];
}
