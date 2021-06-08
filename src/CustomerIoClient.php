<?php

declare(strict_types=1);

namespace CIO;

use CIO\HttpClient\GuzzleHttpClient;
use CIO\HttpClient\HttpClientInterface;
use CIO\Entity\AccountRegion;
use CIO\Request\CustomerIoRequest;
use CIO\Response\CustomerIoResponse;

class CustomerIoClient
{
    /**
     * @var AccountRegion
     */
    private $region;
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * @param mixed[] $credentials
     *
     * @throws \CIO\Exception\InvalidCredentials
     */
    public function __construct(
        array $credentials,
        ?AccountRegion $accountRegion = null,
        ?HttpClientInterface $client = null
    ) {
        $this->region     = $accountRegion ?? AccountRegion::US();
        $this->httpClient = $client ?? new GuzzleHttpClient($credentials);
    }

    public function execute(CustomerIoRequest $request) : CustomerIoResponse
    {
        return $this->httpClient->request(
            $request->getMethod(),
            $request->getApiDomain($this->region) . $request->getEndpoint(),
            $request->getAuthType(),
            $request->getBody()
        );
    }
}
