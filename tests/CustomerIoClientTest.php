<?php

declare(strict_types=1);

namespace Test;

use CIO\AccountRegion;
use CIO\ClientConfig;
use CIO\CustomerIoClient;
use PHPUnit\Framework\TestCase;

class CustomerIoClientTest extends TestCase
{
    public function testInstance()
    {
        $client = new CustomerIoClient('siteId', 'apiKey', new ClientConfig(AccountRegion::US()));

        $this->assertInstanceOf(CustomerIoClient::class, $client);
    }
}
