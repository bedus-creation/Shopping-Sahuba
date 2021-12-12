<?php

namespace App\Domain\Inventory\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    //
    protected $fillable = [
        'type','min','max',
    ];
}
