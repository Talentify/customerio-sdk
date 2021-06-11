<?php

declare(strict_types=1);

namespace CIO\Entity;

use MyCLabs\Enum\Enum;

/**
 * @method static self BASIC()
 * @method static self BEARER()
 */
class AuthType extends Enum
{
    public const BASIC = 1;
    public const BEARER = 2;
}
