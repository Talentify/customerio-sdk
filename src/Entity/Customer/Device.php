<?php

declare(strict_types=1);

namespace CIO\Entity\Customer;

use CIO\Entity\EntityInterface;

/**
 * @see https://www.customer.io/docs/api/#operation/add_device
 */
class Device
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $platform;
    /**
     * @var int|null
     */
    private $lastUsed;

    public function __construct(string $id, string $platform, ?int $lastUsed = null)
    {
        $this->id       = $id;
        $this->platform = $platform;
        $this->lastUsed = $lastUsed ?? null;
    }

    public function toArray() : array
    {
        $device = [
            'device' => [
                'id'       => $this->id,
                'platform' => $this->platform,
            ],
        ];

        if ($this->lastUsed !== null) {
            $device['device']['last_used'] = $this->lastUsed;
        }

        return $device;
    }
}
