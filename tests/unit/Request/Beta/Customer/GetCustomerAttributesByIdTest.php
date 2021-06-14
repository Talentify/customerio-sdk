<?php


namespace CIO\Request\Beta\Customer;

use CIO\CustomerIoClient;
use CIO\Entity\AccountRegion;
use CIO\Entity\Customer\Customer;
use CIO\Entity\Customer\Identifier;
use Helpers\RequestTestCase;
use Helpers\TestClient;

class GetCustomerAttributesByIdTest extends RequestTestCase
{
    public function testGetCustomerAttributesById()
    {
        $httpTestClient = new TestClient();

        $client = new CustomerIoClient(
            ['token' => 'token'],
            AccountRegion::US(),
            $httpTestClient
        );

        $customer = new Customer(
            new Identifier("123"),
            'email@provider.com',
            1622554538,
            [
                'string'  => 'string',
                'boolean' => false,
                'int'     => 1,
            ]
        );
        $request = new GetCustomerAttributesById(
            $customer->getIdentifier()->getId()
        );

        $client->execute($request);

        $executedRequest = $httpTestClient->getRequestsExecuted()[0];

        $url = sprintf(
            'https://beta-api.customer.io/v1/api/customers/%s/attributes',
            $customer->getIdentifier()->getId()
        );
        $this->assertEquals($url, $executedRequest['uri']);
        $this->assertEquals('GET', $executedRequest['method']);
        $this->assertEquals(
            $executedRequest['body'],
            []
        );
    }
}
