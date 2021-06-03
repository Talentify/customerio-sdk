<?php

declare(strict_types=1);

namespace CIO\Api;

use CIO\Api\Track\Customer;
use CIO\Entity\AccountRegion;
use GuzzleHttp\ClientInterface;

class Track
{
    /** @var \CIO\Api\Track\Customer */
    private $customer;

    public function __construct(AccountRegion $accountRegion, array $auth, ClientInterface $client)
    {
        $host = 'https://track.customer.io/api/v1/';
        if ($accountRegion->equals(AccountRegion::EU())) {
            $host = 'https://track-eu.customer.io/api/v1/';
        }
        $this->customer = new Customer($host, $auth, $client);
    }

    public function customer() : Customer
    {
        return $this->customer;
    }
}
