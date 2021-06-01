<?php

declare(strict_types=1);

namespace CIO\Entity;

use MyCLabs\Enum\Enum;

/**
 * @method static US()
 * @method static EU()
 */
class AccountRegion extends Enum
{
    public const US = 'track.customer.io';
    public const EU = 'track-eu.customer.io';
}
