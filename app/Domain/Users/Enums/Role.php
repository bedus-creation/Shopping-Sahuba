<?php

namespace App\Domain\Users\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class Role
 *
 * @package App\Domain\Users\Enums
 */
class Role extends Enum
{
    public const ADMIN = "admin";
    public const SHOP = "shop";
}
