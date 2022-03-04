<?php

declare(strict_types=1);

namespace CIO\Entity\Customer;

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

    public function __construct(string $id, string $platform)
    {
        $this->id       = $id;
        $this->platform = $platform;
    }

    /**
     * @return mixed[]
     */
    public function toArray() : array
    {
        $device = [
            'device' => [
                'id'       => $this->id,
                'platform' => $this->platform,
            ],
        ];

        return $device;
    }
}
