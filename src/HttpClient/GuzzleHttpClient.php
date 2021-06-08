<?php

declare(strict_types=1);

namespace CIO\HttpClient;

use CIO\Entity\RequestMethod;
use CIO\Exception\InvalidCredentials;
use CIO\Response\BaseResponse;
use CIO\Response\CustomerIoResponse;
use GuzzleHttp\Client;

class GuzzleHttpClient implements HttpClientInterface
{
    private const PROTOCOL = 'https://';

    /**
     * @var \GuzzleHttp\Client
     */
    private $guzzleClient;

    /**
     * GuzzleHttpClient constructor.
     *
     * @param mixed[] $credentials
     *
     * @throws \CIO\Exception\InvalidCredentials
     */
    public function __construct(array $credentials)
    {
        $config = [];

        if (isset($credentials['site_id']) && isset($credentials['api_key'])) {
            $config['auth'] = [
                $credentials['site_id'],
                $credentials['api_key'],
            ];
        } else {
            if (isset($credentials['token'])) {
                $config['headers'] = [
                    'Authorization' => sprintf('Bearer %s', $credentials['token']),
                ];
            } else {
                throw new InvalidCredentials('site_id and api_key or token is needed to authenticate on customer.io, please input a valid one.');
            }
        }

        $this->guzzleClient = new Client($config
        );
    }

    public function request(RequestMethod $method, string $uri, array $body = []) : CustomerIoResponse
    {
        $response = $this->guzzleClient->request(
            $method->getValue(),
            self::PROTOCOL . $uri,
            [
                'json' => $body,
            ]
        );

        return new BaseResponse($response->getBody()->getContents());
    }
}
