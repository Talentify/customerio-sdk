<?php

namespace CIO;

interface CustomerIoRequest
{
    /**
     * @return string the relative path to the endpoint, without leading slash. eg: 'customer', wrong: '/customer',
     *                'api/v1/customer'
     */
    public function getRelativePath() : string;

    /**
     * @return \CIO\RequestType http method / request verb
     */
    public function getMethod() : RequestType;

    /**
     * @return array
     */
    public function getBody() : array;
}
