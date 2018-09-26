<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','mobile','telephone','profile_image','cover_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function products(){
        return $this->hasMany('App\Models\Product')->orderBy('id','desc');
    }

    public function profile(){
        return $this->hasOne('App\Models\ShopProfile','user_id');
    }

    public function profile_link(){
        return "/shop/".str_slug($this->name,'-').'/'.$this->id;
    }

    public function profileImage(){
        return $this->belongsTo('App\Models\Media','profile_image');
    }

    public function coverImage(){
        return $this->belongsTo('App\Models\Media','cover_image');
    }

}
