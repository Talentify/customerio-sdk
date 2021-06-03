<?php

declare(strict_types=1);

namespace CIO\Request\Track\Customer;

use CIO\Entity\Customer\Customer;
use CIO\Entity\RequestType;
use CIO\Request\CustomerIoRequest;

class AddOrUpdateCustomer implements CustomerIoRequest
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
        return sprintf('%s', $this->customer->getIdentifier());
    }

    public function getMethod() : RequestType
    {
        return RequestType::PUT();
    }

    public function getBody() : array
    {
        return $this->customer->toArray();
    }
}
