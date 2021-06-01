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
    /**
     * @var \CIO\ClientConfig
     */
    private $config;

    public function __construct(string $siteId, string $apiKey, ClientConfig $config)
    {
        $this->siteId = $siteId;
        $this->apiKey = $apiKey;
        $this->config = $config ?? new ClientConfig(AccountRegion::US());
        $this->client = new Client([
            'base_uri' => $this->config->getApiUri() . '/' . $this->config->getApiBasePath(),
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
            $request->getRelativePath(),
            [
                'json' => $request->getBody(),
            ]
        );
    }
}
