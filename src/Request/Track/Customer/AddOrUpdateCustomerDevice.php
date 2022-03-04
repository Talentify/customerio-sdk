<?php

declare(strict_types=1);

namespace CIO\Request\Track\Customer;

use CIO\Entity\Customer\Customer;
use CIO\Entity\Customer\Device;
use CIO\Entity\EntityInterface;
use CIO\Entity\RequestMethod;
use CIO\Request\Track\TrackBaseRequest;

class AddOrUpdateCustomerDevice extends TrackBaseRequest
{
    /**
     * @var \CIO\Entity\Customer\Customer
     */
    private $customer;
    /**
     * @var Device
     */
    private $device;

    public function __construct(EntityInterface $customer, Device $device)
    {
        assert($customer instanceof Customer);
        $this->customer = $customer;
        $this->device   = $device;
    }

    public function getEndpoint() : string
    {
        return sprintf('/api/v1/customers/%s/devices', $this->customer->getIdentifier());
    }

    public function getMethod() : RequestMethod
    {
        return RequestMethod::PUT();
    }

    public function getBody() : array
    {
        return $this->device->toArray();
    }
}
