# Customer.io PHP Client

A basic php client for use customer.io.

## QuickStart

Go and create a token to your workspace at: https://fly.customer.io/settings/api_credentials?keyType=app

``` php
$client = new CustomerIoClient(
    'token',
    AccountRegion::US()
)

// instance your request with his requeriments (generally entities from CIO\Entity namespace)
$request = new AddOrUpdateCustomer(
    new Customer(
        new Identifier(123),
        'email@provider.com',
        1622554538,
        [
             'attributeName'  => 'string|int|boolean only',
             'name'           => 'string',
             'converted'      => false,
             'type'           => 1,
        ]
    )
);

$response = $client->execute($request);
```

## Dev

- install dependencies `docker-compose run php composer install`;
- run tests `docker-compose run php ./vendor/bin/phpunit`;

### Improvments roadmap:

- [ ] request exceptions;

