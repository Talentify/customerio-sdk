# Customer.io PHP Client
A basic php client for use customer.io.


## Usage
___


Go and get your workspace credentials at: https://fly.customer.io/settings/api_credentials

```
$client = new CIO\CustomerIoClient(
    'site-id',
    'api-key'
)

// instance your request with his requeriments (generally entities from CIO\Entity namespace)
$request = new CIO\Request\ExampleRequest($requirements);
$response = $client->execute($request);

echo $response->getStatusCode(); // 200 (I'm cheatting its a guzzle response) 
```

## Dev
___

- install dependencies `composer install`;
- run tests `./vendor/bin/phpunit`;


