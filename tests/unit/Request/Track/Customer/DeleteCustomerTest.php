<?php

declare(strict_types=1);

namespace CIO\Request\Track\Customer;

use CIO\CustomerIoClient;
use CIO\Entity\AccountRegion;
use CIO\Entity\Customer\Customer;
use CIO\Entity\Customer\Identifier;
use CIO\Request\Track\Customer\AddOrUpdateCustomer;
use Helpers\RequestTestCase;
use Helpers\TestClient;

class DeleteCustomerTest extends RequestTestCase
{
    public function testDeleteCustomerRequest() : void
    {
        $httpTestClient = new TestClient();

        $client = new CustomerIoClient(
            ['token' => 'token'],
            AccountRegion::US(),
            $httpTestClient
        );

        $request = new DeleteCustomer(
            new Customer(
                new Identifier("123")
            )
        );

        $client->execute($request);

        $executedRequest = $httpTestClient->getRequestsExecuted()[0];

        $this->assertEquals('https://track.customer.io/api/v1/customers/123', $executedRequest['uri']);
        $this->assertEquals('DELETE', $executedRequest['method']);
    }
}
