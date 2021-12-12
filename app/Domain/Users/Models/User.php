<?php

namespace App\Domain\Users\Models;

use Aammui\RolePermission\Traits\HasRole;
use App\Domain\Inventory\Models\Product;
use App\Domain\Users\Jobs\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 *
 * @package App\Domain\Users\Models
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'telephone',
        'profile_image',
        'cover_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class)
            ->orderBy('id', 'desc');
    }

    public function profile()
    {
        return $this->hasOne('App\Domain\Users\Models\ShopProfile', 'user_id');
    }

    public function profile_link()
    {
        return "/shop/".str_slug($this->name, '-').'/'.$this->id;
    }

    public function profileImage()
    {
        return $this->belongsTo('App\Domain\Base\Models\Media', 'profile_image');
    }

    public function coverImage()
    {
        return $this->belongsTo('App\Domain\Base\Models\Media', 'cover_image');
    }

    public function sendEmailVerificationNotification()
    {
        VerifyEmail::dispatch($this);
    }
}
