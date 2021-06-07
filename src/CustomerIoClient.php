<?php

declare(strict_types=1);

namespace CIO;

use CIO\HttpClient\GuzzleHttpClient;
use CIO\HttpClient\HttpClientInterface;
use CIO\Entity\AccountRegion;
use CIO\Request\CustomerIoRequest;
use CIO\Response\BaseResponse;
use CIO\Response\CustomerIoResponse;

class CustomerIoClient
{
    /**
     * @var string
     */
    private $token;
    /**
     * @var AccountRegion
     */
    private $region;
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    public function __construct(
        string $token,
        ?AccountRegion $accountRegion = null,
        ?HttpClientInterface $client = null
    ) {
        $this->token  = $token;
        $this->region = $accountRegion ?? AccountRegion::US();
        $this->httpClient = $client ?? new GuzzleHttpClient($this->token);
    }

    public function request(CustomerIoRequest $request) : CustomerIoResponse
    {
        $httpResponse = $this->httpClient->request(
            $request->getMethod()->getValue(),
            $request->getApiDomain($this->region) . $request->getEndpoint(),
            $request->getBody()
        );

        return new BaseResponse($httpResponse->getBody()->getContents());
    }
}
