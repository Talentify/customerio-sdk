<?php

declare(strict_types=1);

namespace CIO;

use CIO\Entity\AccountRegion;
use PHPUnit\Framework\TestCase;

class ClientConfigTest extends TestCase
{
    public function testGetDefaults()
    {
        $config = new ClientConfig(
            AccountRegion::US(),
            'v2',
            'test-api'
        );

        $this->assertEquals('https://track.customer.io', $config->getApiUri());
        $this->assertEquals('test-api/v2/', $config->getApiBasePath());
    }
}
