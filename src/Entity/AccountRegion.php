<?php

declare(strict_types=1);

namespace CIO\Entity;

use MyCLabs\Enum\Enum;

/**
 * @method static self US()
 * @method static self EU()
 */
class AccountRegion extends Enum
{
    public const US = 1;
    public const EU = 2;
}
