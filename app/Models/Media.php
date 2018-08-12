<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    protected $fillable=["base_url","in_json","type"];

    public static function boot()
    {
        parent::boot();

        static::deleting(function($media){
            Storage::disk('public')->delete(json_decode($media->in_json)->images->small);
        });
    }
}
