<?php

namespace App\Traits;

use App\Utils\Role;


trait  HasRole {
    public function roles(){
        $this->belongsTomany(Role::class);
    }
}