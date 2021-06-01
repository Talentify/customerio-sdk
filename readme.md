# Customer.io PHP Client

A basic php client for use customer.io.

## QuickStart

Go and get your workspace credentials at: https://fly.customer.io/settings/api_credentials

``` php
$client = new CustomerIoClient(
    'site-id',
    'api-key',
    new ClientConfig(AccountRegion::US());
)

// instance your request with his requeriments (generally entities from CIO\Entity namespace)
$request = new AddOrUpdateCustomer(
    new Customer(
        new Identifier(123),
        'email@provider.com',
        1622554538,
        [
             'attributeName'  => 'string|int|boolean only'
             'name'           => 'string',
             'converted'      => false,
             'type'           => 1,
        ]
);

$response = $client->execute($request);
echo $response->getStatusCode(); // 200 (I'm cheatting its a guzzle response) 
```

## Dev

- install dependencies `composer install`;
- run tests `./vendor/bin/phpunit`;

### Improvments roadmap:

- [ ] email validation on customer entity;
- [ ] request exceptions;
- [ ] simpler response object;
- [ ] request unit tests;
- [ ] add facade;
- [ ] add phpstan;

