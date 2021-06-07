<?php

declare(strict_types=1);

namespace CIO\HttpClient;

use CIO\Entity\RequestMethod;
use CIO\Response\CustomerIoResponse;

interface HttpClientInterface
{
    public function request(RequestMethod $method, string $uri, array $body = []) : CustomerIoResponse;
}
