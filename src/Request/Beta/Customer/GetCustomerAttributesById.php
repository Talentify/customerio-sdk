<?php

declare(strict_types=1);

namespace CIO\Request\Beta\Customer;

use CIO\Entity\Customer\Customer;
use CIO\Entity\RequestMethod;
use CIO\Request\Beta\BetaBaseRequest;

class GetCustomerAttributesById extends BetaBaseRequest
{
    /**
     * @var string
     */
    private $customerId;

    public function __construct(string $customerId)
    {
        $this->customerId = $customerId;
    }

    public function getEndpoint() : string
    {
        return sprintf('/v1/api/customers/%s/attributes', $this->customerId);
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
