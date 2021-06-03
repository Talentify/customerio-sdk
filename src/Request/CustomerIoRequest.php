<?php

declare(strict_types=1);

namespace CIO\Request;

use CIO\Entity\RequestType;

interface CustomerIoRequest
{
    /**
     * @return string the relative path to the endpoint, without leading slash. eg: 'customer', wrong: '/customer',
     *                'api/v1/customer'
     */
    public function getEndpoint() : string;

    /**
     * @return \CIO\Entity\RequestType http method / request verb
     */
    public function getMethod() : RequestType;

    /**
     * @return array
     */
    public function getBody() : array;
}
