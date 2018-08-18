<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopProfile extends Model
{
    protected $dates =[
        'established_at'
    ];  

    protected $fillable=['info','address','opening_hours','sologon','user_id','established_at'];

    // public function setEstablishedAtAttribute($value)
    // {
    //     $this->attributes['established_at'] = 
    // }
}
