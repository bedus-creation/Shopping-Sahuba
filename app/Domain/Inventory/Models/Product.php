<?php

namespace App\Domain\Inventory\Models;

use App\Core\Constants\TableName;
use App\Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 *
 * @package App\Domain\Inventory\Models
 */
class Product extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = TableName::PRODUCT;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'condition',
        'negotiable',
        'expiry_date',
        'price_id',
        'user_id',
        'category_id',
        'details',
    ];

    protected $dates = ['created_at', 'updated_at', 'expiry_date', 'deleted_at'];

    public function medias()
    {
        return $this->belongsToMany('App\Models\Media');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function price()
    {
        return $this->belongsTo('App\Models\Price');
    }

    /**
     * @return string
     */
    public function product_link(): string
    {
        return '/product/'.str_slug($this->name, '-').'/'.$this->id;
    }
}
