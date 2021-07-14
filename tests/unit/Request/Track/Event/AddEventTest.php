<?php

declare(strict_types=1);

namespace CIO\Request\Track\Event;

use CIO\CustomerIoClient;
use CIO\Entity\AccountRegion;
use CIO\Entity\Customer\Customer;
use CIO\Entity\Customer\Identifier;
use CIO\Entity\Event\Event;
use CIO\Request\Track\Customer\AddOrUpdateCustomer;
use Helpers\RequestTestCase;
use Helpers\TestClient;

class AddEventTest extends RequestTestCase
{
    public function testAddEventRequest() : void
    {
        $httpTestClient = new TestClient();

        $client = new CustomerIoClient(
            [
                'site_id' => '0229acbb6b1d4f8d75dc',
                'api_key' => '70bac048af10e67645ea'
            ],
            AccountRegion::US(),
            $httpTestClient
        );

        $request = new AddEvent(
            new Event(
                new Identifier("123"),
                'unit_test',
                [
                    'string'  => 'string',
                    'boolean' => false,
                    'int'     => 1,
                ]
            )
        );

        $client->execute($request);

        $executedRequest = $httpTestClient->getRequestsExecuted()[0];

        $this->assertEquals('https://track.customer.io/api/v1/customers/123/events', $executedRequest['uri']);
        $this->assertEquals('POST', $executedRequest['method']);
        $this->assertEquals(
            $executedRequest['body'],
            [
                'name'      => 'unit_test',
                'data' => [
                    'string'     => 'string',
                    'boolean'    => false,
                    'int'        => 1,
                ]
            ]
        );
    }
}
