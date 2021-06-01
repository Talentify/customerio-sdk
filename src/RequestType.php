<?php

namespace CIO;

use MyCLabs\Enum\Enum;

/**
 * @method static static PUT()
 * @method static static POST()
 * @method static static DELETE()
 * @method static static GET()
 */
class RequestType extends Enum
{
    const GET    = 'GET';
    const POST   = 'POST';
    const PUT    = 'PUT';
    const DELETE = 'DELETE';
}
