<?php

declare(strict_types=1);

namespace CIO\Api;

use CIO\Request\CustomerIoRequest;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class BasicApi
{
    /**
     * @var \GuzzleHttp\Client
     */
    private $client;
    /** @var string */
    private $host;
    /** @var array */
    private $auth;

    public function __construct(string $host, array $auth, ?ClientInterface $client = null)
    {
        $this->host   = $host;
        $this->auth   = $auth;
        $this->client = $client ?? new Client();
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function execute(string $path, CustomerIoRequest $request) : ResponseInterface
    {
        return $this->client->request(
            $request->getMethod()->getValue(),
            $path,
            [
                'json' => $request->getBody(),
            ] + $this->getDefaults()
        );
    }

    /**
     * @return array
     */
    protected function getDefaults() : array
    {
        return [
            'base_uri' => $this->host,
            'auth'     => $this->auth,
        ];
    }
}
