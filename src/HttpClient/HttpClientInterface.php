<?php

declare(strict_types=1);

namespace CIO\HttpClient;

use CIO\Entity\AuthType;
use CIO\Entity\RequestMethod;
use CIO\Response\CustomerIoResponse;

interface HttpClientInterface
{
    /**
     * @param mixed[] $body
     *
     * @throws \CIO\Exception\InvalidCredentials
     * @throws \CIO\Exception\NotImplemented
     */
    public function request(
        RequestMethod $method,
        string $uri,
        AuthType $authType,
        array $body = []
    ) : CustomerIoResponse;
}
