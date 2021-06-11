<?php

declare(strict_types=1);

namespace CIO\Request;

use CIO\CustomerIoClient;
use CIO\Entity\AccountRegion;
use CIO\Entity\Customer\Customer;
use CIO\Entity\Customer\Identifier;
use CIO\Request\Track\Customer\AddOrUpdateCustomer;
use Helpers\RequestTestCase;
use Helpers\TestClient;

class AddOrUpdateCustomerTest extends RequestTestCase
{
    public function testAddOrUpdateCustomerRequest() : void
    {
        $httpTestClient = new TestClient();

        $client = new CustomerIoClient(
            ['token' => 'token'],
            AccountRegion::US(),
            $httpTestClient
        );

        $request = new AddOrUpdateCustomer(
            new Customer(
                new Identifier("123"),
                'email@provider.com',
                1622554538,
                [
                    'string'  => 'string',
                    'boolean' => false,
                    'int'     => 1,
                ]
            )
        );

        $client->execute($request);

        $executedRequest = $httpTestClient->getRequestsExecuted()[0];

        $this->assertEquals('https://track.customer.io/api/v1/customers/123', $executedRequest['uri']);
        $this->assertEquals('PUT', $executedRequest['method']);
        $this->assertEquals(
            $executedRequest['body'],
            [
                'email'      => 'email@provider.com',
                'created_at' => 1622554538,
                'string'     => 'string',
                'boolean'    => false,
                'int'        => 1,
            ]
        );
    }
}
