<?php

declare(strict_types=1);

namespace CIO\Request\Beta\Customer;

use CIO\Entity\Customer\Customer;
use CIO\Entity\RequestMethod;
use CIO\Request\Beta\BetaBaseRequest;

class GetCustomerAttributesById extends BetaBaseRequest
{
    /**
     * @var Customer
     */
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getEndpoint() : string
    {
        return sprintf('/v1/api/customers/%s/attributes', $this->customer->getIdentifier()->getId());
    }

    public function getMethod() : RequestMethod
    {
        return RequestMethod::GET();
    }

    public function getBody() : array
    {
        return [];
    }
}
