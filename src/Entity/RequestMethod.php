<?php

declare(strict_types=1);

namespace CIO\Entity;

use MyCLabs\Enum\Enum;

/**
 * @method static static PUT()
 * @method static static POST()
 * @method static static DELETE()
 * @method static static GET()
 */
class RequestMethod extends Enum
{
    const GET    = 'GET';
    const POST   = 'POST';
    const PUT    = 'PUT';
    const DELETE = 'DELETE';
}
