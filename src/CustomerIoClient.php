<?php

namespace CIO;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class CustomerIoClient
{
    /**
     * @var string
     */
    private $siteId;
    /**
     * @var string
     */
    private $apiKey;
    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    public function __construct(string $siteId, string $apiKey)
    {
        $this->siteId = $siteId;
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'defaults' => [
                'auth' => [$this->siteId, $this->apiKey],
            ],
        ]);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(CustomerIoRequest $request) : Response
    {
        return $this->client->request(
            $request->getMethod()->getValue(),
            $request->getPath(),
            [
                'json' => $request->getBody(),
            ]
        );
    }
}
