<?php

declare(strict_types=1);

namespace CIO\Request\Track\Customer;

use CIO\Entity\Customer\Customer;
use CIO\Entity\RequestMethod;
use CIO\Request\Track\TrackBaseRequest;

class AddOrUpdateCustomer extends TrackBaseRequest
{
    /**
     * @var \CIO\Entity\Customer\Customer
     */
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getEndpoint() : string
    {
        return sprintf('/api/v1/customers/%s', $this->customer->getIdentifier());
    }

    public function getMethod() : RequestMethod
    {
        return RequestMethod::PUT();
    }

    public function getBody() : array
    {
        return $this->customer->toArray();
    }
}
