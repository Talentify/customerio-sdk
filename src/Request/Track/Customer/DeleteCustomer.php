<?php

declare(strict_types=1);

namespace CIO\Request\Track\Customer;

use CIO\Entity\Customer\Customer;
use CIO\Entity\EntityInterface;
use CIO\Entity\RequestMethod;
use CIO\Request\Track\TrackBaseRequest;

class DeleteCustomer extends TrackBaseRequest
{
    /**
     * @var \CIO\Entity\Customer\Customer
     */
    private $customer;

    public function __construct(EntityInterface $customer)
    {
        assert($customer instanceof Customer);
        $this->customer = $customer;
    }

    public function getEndpoint() : string
    {
        return sprintf('/api/v1/customers/%s', $this->customer->getIdentifier());
    }

    public function getMethod() : RequestMethod
    {
        return RequestMethod::DELETE();
    }

    public function getBody() : array
    {
        return [];
    }
}
