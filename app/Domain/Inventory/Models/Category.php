<?php

namespace App\Domain\Inventory\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @package App\Domain\Inventory\Models
 */
class Category extends Model
{
    protected $fillable = ["name"];

    public function products()
    {
        return $this->hasMany(Product::class)->orderBy('id', 'desc');
    }
}
