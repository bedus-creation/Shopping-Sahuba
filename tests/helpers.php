<?php

use Database\Factories\UserFactory;

function createUser($role = "shop", $data = [])
{
    $user = UserFactory::new()->create($data);
    $user->addRole($role);

    return $user;
}
