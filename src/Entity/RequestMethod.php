<?php

declare(strict_types=1);

namespace CIO\Entity;

use MyCLabs\Enum\Enum;

/**
 * @method static self PUT()
 * @method static self POST()
 * @method static self DELETE()
 * @method static self GET()
 */
class RequestMethod extends Enum
{
    const GET    = 'GET';
    const POST   = 'POST';
    const PUT    = 'PUT';
    const DELETE = 'DELETE';
}
