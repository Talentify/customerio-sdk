<?php

namespace CIO\HttpClient;

use CIO\Entity\RequestMethod;
use GuzzleHttp\Client;

class GuzzleHttpClient implements HttpClientInterface
{
    private const PROTOCOL = 'https://';

    /**
     * @var \GuzzleHttp\Client
     */
    private $guzzleClient;

    public function __construct(string $token)
    {
        $this->guzzleClient = new Client([
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]
        );
    }

    public function request(RequestMethod $method, string $uri, array $body = [])
    {
        $this->guzzleClient->request(
            $method,
            self::PROTOCOL . $uri,
            [
                'json' => $body,
            ]
        );
    }
}
