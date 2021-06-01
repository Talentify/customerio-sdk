<?php

namespace CIO;

use MyCLabs\Enum\Enum;

/**
 * @method static static PUT()
 */
class RequestType extends Enum
{
    const GET    = 'GET';
    const POST   = 'POST';
    const PUT    = 'PUT';
    const DELETE = 'DELETE';
}
