<?php

declare(strict_types=1);

namespace CIO;

use CIO\Entity\AccountRegion;
use CIO\Request\CustomerIoRequest;
use CIO\Response\BaseResponse;
use CIO\Response\CustomerIoResponse;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

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

    public function __construct(
        string $siteId,
        string $apiKey,
        ?ClientConfig $config = null,
        ?ClientInterface $client = null
    )
    {
        $this->siteId = $siteId;
        $this->apiKey = $apiKey;
        $this->config = $config ?? new ClientConfig(AccountRegion::US());
        $this->client = $client ?? new Client();
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function execute(CustomerIoRequest $request): CustomerIoResponse
    {
        $httpResponse = $this->client->request(
            $request->getMethod()->getValue(),
            $request->getRelativePath(),
            [
                'json' => $request->getBody(),
            ] + $this->getDefaults()
        );

        return new BaseResponse($httpResponse->getBody()->getContents());
    }

    /**
     * @return array
     */
    private function getDefaults(): array
    {
        return [
            'base_uri' => $this->config->getApiUri() . $this->config->getApiBasePath(),
            'auth' => [$this->siteId, $this->apiKey],
        ];
    }
}
