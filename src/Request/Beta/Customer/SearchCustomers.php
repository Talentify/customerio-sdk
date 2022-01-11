<?php

declare(strict_types=1);

namespace CIO\Request\Beta\Customer;

use CIO\Entity\RequestMethod;
use CIO\Request\Beta\BetaBaseRequest;

class SearchCustomers extends BetaBaseRequest
{
    /**
     * @var array
     */
    private $filters;

    /**
     * @param array $filters - to understand the filters array: https://customer.io/docs/api/#operation/getPeopleFilter
     */
    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    public function getEndpoint() : string
    {
        return '/v1/api/customers';
    }

    public function getMethod() : RequestMethod
    {
        return RequestMethod::POST();
    }

    public function getBody() : array
    {
        return [
            'filter' => $this->filters
        ];
    }
}
