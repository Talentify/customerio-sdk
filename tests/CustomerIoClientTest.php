<?php

declare(strict_types=1);

namespace Test;

use CIO\CustomerIoClient;
use PHPUnit\Framework\TestCase;

class CustomerIoClientTest extends TestCase
{
    public function testInstance()
    {
        $client = new CustomerIoClient('siteId', 'apiKey');

        $this->assertInstanceOf(CustomerIoClient::class, $client);
    }
}
