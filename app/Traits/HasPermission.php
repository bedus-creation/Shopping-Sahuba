<?php

namespace App\Traits;

use App\Models\Utils\Permission;

trait  HasPermission {

    public function permissions(){
        $this->belongsTomany(Permission::class);
    }
    
}