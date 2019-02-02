<?php

namespace App\Traits;

use App\Utils\Role;

trait HasRole
{
    public function hasRole($roles=[])
    {
        $data = array_intersect($roles, $this->getRoles());
        return count($data)>0;
    }

    public function getRoles()
    {
        return collect($this->roles)->map(function ($item) {
            return strtolower($item->name);
        })->toArray();
    }

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
