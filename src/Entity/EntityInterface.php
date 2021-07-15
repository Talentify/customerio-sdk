<?php

declare(strict_types=1);

namespace CIO\Entity;

interface EntityInterface
{
    /**
     * @return mixed[]
     */
    public function toArray() : array;
}
