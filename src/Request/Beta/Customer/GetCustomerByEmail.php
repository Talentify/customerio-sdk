<?php

declare(strict_types=1);

namespace CIO\Request\Beta\Customer;

use CIO\Entity\Customer\Customer;
use CIO\Entity\Customer\Identifier;
use CIO\Entity\RequestMethod;
use CIO\Request\Beta\BetaBaseRequest;

class GetCustomerByEmail extends BetaBaseRequest
{
    /**
     * @var Identifier
     */
    private $identifier;

    public function __construct(Identifier $identifier)
    {
        $this->identifier = $identifier;
    }

    public function getEndpoint() : string
    {
        return sprintf('/v1/api/customers?email=%s', $this->identifier->getId());
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
