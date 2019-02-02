<?php

namespace App\Traits;

use App\Utils\Role;

trait HasRole
{
    public function createRole($role=["shop"])
    {
        $role = collect($role)->map(function ($item) {
            return Role::firstOrCreate(['name' =>ucfirst($item)])->id;
        });

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
