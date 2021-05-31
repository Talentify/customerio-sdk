<?php

namespace Test;

use CIO\CustomerIoClient;
use PHPUnit\Framework\TestCase;

class CustomerIoClientTest extends TestCase
{
    public function testInstance()
    {
        $client = new CustomerIoClient();

        $this->assertInstanceOf(CustomerIoClient::class, $client);
    }
}
