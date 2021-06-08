<?php

namespace Helpers;

use CIO\Entity\RequestMethod;
use CIO\HttpClient\HttpClientInterface;
use CIO\Response\BaseResponse;
use CIO\Response\CustomerIoResponse;

class TestClient implements HttpClientInterface
{
    private const PROTOCOL = 'https://';

    private $container = [];

    public function request(RequestMethod $method, string $uri, array $body = []) : CustomerIoResponse
    {
        $this->container[] = [
            'method' => $method,
            'uri'    => self::PROTOCOL . $uri,
            'body'   => $body,
        ];

        return new BaseResponse('{}');
    }

    public function getRequestsExecuted() : array
    {
        return $this->container;
    }
}
