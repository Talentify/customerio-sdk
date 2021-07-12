<?php

declare(strict_types=1);

namespace CIO\HttpClient;

use CIO\Entity\AuthType;
use CIO\Entity\RequestMethod;
use CIO\Exception\InvalidCredentials;
use CIO\Exception\NotImplemented;
use CIO\Response\BaseResponse;
use CIO\Response\CustomerIoResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class GuzzleHttpClient implements HttpClientInterface
{
    private const PROTOCOL = 'https://';

    /**
     * @var \GuzzleHttp\Client
     */
    private $guzzleClient;
    /**
     * @var mixed[]
     */
    private $credentials;

    /**
     * GuzzleHttpClient constructor.
     *
     * @param mixed[] $credentials
     */
    public function __construct(array $credentials)
    {
        $this->guzzleClient = new Client();
        $this->credentials  = $credentials;
    }

    /**
     * @throws \CIO\Exception\InvalidCredentials
     * @throws \CIO\Exception\NotImplemented
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(
        RequestMethod $method,
        string $uri,
        AuthType $authType,
        array $body = []
    ) : CustomerIoResponse {
        switch ($authType->getValue()) {
            case AuthType::BASIC:
                $options = $this->getBasicAuth();
                break;
            case AuthType::BEARER:
                $options = $this->getBearerAuth();
                break;
            default:
                throw new NotImplemented('credentials type not implemented');
        }

        $options['json'] = $body;

        try {
            $response = $this->guzzleClient->request(
                $method->getValue(),
                self::PROTOCOL . $uri,
                $options
            );
        } catch (RequestException $e) {
            if (empty($e->getResponse())) {
                throw $e;
            }

            $response = $e->getResponse();
        }

        return new BaseResponse($response->getStatusCode(), $response->getBody()->getContents());
    }

    /**
     * @return mixed[]
     * @throws \CIO\Exception\InvalidCredentials
     */
    private function getBasicAuth() : array
    {
        if (!isset($this->credentials['site_id']) || !isset($this->credentials['api_key'])) {
            throw new InvalidCredentials('this request need site_id and api_key credentials');
        }

        return [
            'auth' => [
                $this->credentials['site_id'],
                $this->credentials['api_key'],
            ],
        ];
    }

    /**
     * @return mixed[]
     * @throws \CIO\Exception\InvalidCredentials
     */
    private function getBearerAuth() : array
    {
        if (!isset($this->credentials['token'])) {
            throw new InvalidCredentials('this request need token credentials');
        }

        return [
            'headers' => [
                'Authorization' => sprintf('Bearer %s', $this->credentials['token']),
            ],
        ];
    }
}
