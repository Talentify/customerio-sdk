<?php

namespace Helpers;

use CIO\Entity\AuthType;
use CIO\Entity\RequestMethod;
use CIO\HttpClient\HttpClientInterface;
use CIO\Response\BaseResponse;
use CIO\Response\CustomerIoResponse;

class TestClient implements HttpClientInterface
{
    private const PROTOCOL = 'https://';

    private $container = [];

    public function request(
        RequestMethod $method,
        string $uri,
        AuthType $authType,
        array $body = []
    ) : CustomerIoResponse {
        $this->container[] = [
            'method' => $method,
            'uri'    => self::PROTOCOL . $uri,
            'body'   => $body,
        ];

        return new BaseResponse(200, '{}');
    }

    public function getRequestsExecuted() : array
    {
        return $this->container;
    }
}
