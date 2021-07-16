<?php

declare(strict_types=1);

namespace CIO\Entity;

use CIO\Entity\Customer\Identifier;

interface EntityInterface
{
    /**
     * @return mixed[]
     */
    public function toArray() : array;

    /**
     * @return Identifier
     */
    public function getIdentifier() : Identifier;
}
