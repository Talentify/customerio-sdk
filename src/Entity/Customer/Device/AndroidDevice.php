<?php

declare(strict_types=1);

namespace CIO\Entity\Customer\Device;

use CIO\Entity\Customer\Device;

/**
 * @see https://www.customer.io/docs/api/#operation/add_device
 */
class AndroidDevice extends Device
{
    public function __construct(string $id)
    {
        parent::__construct($id, 'android');
    }
}
