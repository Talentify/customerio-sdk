<?php

declare(strict_types=1);

namespace CIO\Entity\Customer;

/**
 * @see https://www.customer.io/docs/api/#operation/add_device
 */
abstract class Device
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $platform;

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
