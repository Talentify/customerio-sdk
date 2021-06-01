<?php

declare(strict_types=1);

namespace CIO;

use PHPUnit\Framework\TestCase;

/**
 * todo - wip
 * - use request test case helper to test if auth and base path is going ok
 */
class CustomerIoClientTest extends TestCase
{
    public function testInstanceWithDefaults()
    {
        // $this->assertEquals(
        //     'https://track.customer.io' . $clientConfig->getApiBasePath(),
        //     (string)$httpClient->getConfig('base_uri')
        // );
    }

    public function testInstanceWithEuropeanRegion()
    {
        // $this->assertEquals(
        //     'https://track-eu.customer.io' . $clientConfig->getApiBasePath(),
        //     (string)$httpClient->getConfig('base_uri')
        // );
    }

    public function testAuthOnRequest()
    {
        // $client       = new CustomerIoClient('siteId', 'apiKey', new ClientConfig(AccountRegion::EU()));
        // $httpClient   = $client->getClient();
        // $clientConfig = $client->getConfig();
        //
        // /** guzzle http basic auth */
        // $this->assertEquals('siteId', $httpClient->getConfig('auth')[0]);
        // $this->assertEquals('apiKey', $httpClient->getConfig('auth')[1]);
    }

}
