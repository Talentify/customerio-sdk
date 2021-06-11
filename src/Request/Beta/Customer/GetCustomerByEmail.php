<?php

declare(strict_types=1);

namespace CIO\Request\Beta\Customer;

use CIO\Entity\Customer\Customer;
use CIO\Entity\RequestMethod;
use CIO\Request\Beta\BetaBaseRequest;

class GetCustomerByEmail extends BetaBaseRequest
{
    /**
     * @var string
     */
    private $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function getEndpoint() : string
    {
        return sprintf('/v1/api/customers?email=%s', $this->email);
    }

    public function getMethod() : RequestMethod
    {
        return RequestMethod::GET();
    }

    public function getBody() : array
    {
        return '';
    }
}
