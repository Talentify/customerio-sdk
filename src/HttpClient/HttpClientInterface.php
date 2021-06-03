<?php

declare(strict_types=1);

namespace CIO\HttpClient;

use CIO\Entity\RequestMethod;

interface HttpClientInterface
{
    public function request(RequestMethod $method, string $uri, array $body = []);
}
