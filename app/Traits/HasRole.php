<?php

namespace App\Traits;

use App\Utils\Role;

trait HasRole
{
    public function createRole($role="shop")
    {
        $role = Role::firstOrCreate(['name' =>ucfirst($role)]);

        $this->roles()->sync($role);
    }

    public function roles()
    {
        return $this->belongsTomany(Role::class, "user_has_role");
    }

    public function redirectTo()
    {
        return config('roles.'.$role.".path") ?? "shopping";
    }
}
