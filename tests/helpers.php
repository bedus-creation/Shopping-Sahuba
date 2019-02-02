<?php

use App\User;

function createUser($data=[], $role= "shop")
{
    $user = factory(User::class)->create($data);
    $user->createRole($role);
    return $user;
}
