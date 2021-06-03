<?php

declare(strict_types=1);

namespace CIO\Api\Track;

use CIO\Api\BasicApi;
use CIO\Request\Track\Customer\AddOrUpdateCustomer;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class Customer extends BasicApi
{
    /** @var string */
    private $path = 'customers/';

    public function __construct(string $host, array $auth, ClientInterface $client)
    {
        parent::__construct($host, $auth, $client);
    }

    public function addOrUpdate(AddOrUpdateCustomer $request) : ResponseInterface
    {
        return $this->execute($this->path, $request);
    }
}
