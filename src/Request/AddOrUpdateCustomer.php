<?php

declare(strict_types=1);

namespace CIO\Request;

use CIO\CustomerIoRequest;
use CIO\Entity\Customer;
use CIO\RequestType;

class AddOrUpdateCustomer implements CustomerIoRequest
{
    /**
     * @var \CIO\Entity\Customer
     */
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getRelativePath() : string
    {
        return sprintf('customers/%s', $this->customer->getIdentifier());
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
