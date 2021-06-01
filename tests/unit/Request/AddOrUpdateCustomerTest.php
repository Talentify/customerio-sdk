<?php

declare(strict_types=1);

namespace CIO\Request;

use CIO\ClientConfig;
use CIO\CustomerIoClient;
use CIO\Entity\AccountRegion;
use CIO\Entity\Customer\Customer;
use CIO\Entity\Customer\Identifier;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Helpers\RequestTestCase;

class AddOrUpdateCustomerTest extends RequestTestCase
{
    /**
     * todo - refactor to generic test to reuse in other requests tests as easy as possible
     */
    public function testAddOrUpdateCustomerRequest()
    {
        $mock = new MockHandler([
            new Response(200, [], '{}'),
        ]);

        $container    = [];
        $handlerStack = HandlerStack::create($mock);
        $handlerStack->push(Middleware::history($container));
        $guzzleClient = new Client(['handler' => $handlerStack]);

        $client = new CustomerIoClient(
            'siteId',
            'apiKey',
            new ClientConfig(AccountRegion::US()),
            $guzzleClient
        );

        $request = new AddOrUpdateCustomer(
            new Customer(
                new Identifier(123),
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

        $this->assertCount(1, $container);

        /** @var \GuzzleHttp\Psr7\Request $request */
        $request = $container[0]['request'];

        $this->assertEquals('https://track.customer.io/api/v1/customers/123', (string)$request->getUri());
        $this->assertEquals('PUT', (string)$request->getMethod());
        $this->assertEquals(
            json_decode($request->getBody()->getContents(), true),
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
