<?php

declare(strict_types=1);

namespace CIO\Request;

use CIO\Entity\AccountRegion;
use CIO\Entity\RequestMethod;

interface CustomerIoRequest
{
    /**
     * @return string the domain of the api eg: 'track.customer.io'
     */
    public function getApiDomain(AccountRegion $region) : string;

    /**
     * @return string the relative path to the endpoint, without leading slash. eg: 'customer', wrong: '/customer',
     *                'api/v1/customer'
     */
    public function getEndpoint() : string;

    /**
     * @return \CIO\Entity\RequestMethod http method / request verb
     */
    public function getMethod() : RequestMethod;

    /**
     * @return mixed[]
     */
    public function getBody() : array;
}
