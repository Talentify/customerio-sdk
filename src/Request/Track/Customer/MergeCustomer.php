<?php

declare(strict_types=1);

namespace CIO\Request\Track\Customer;

use CIO\Entity\Customer\Customer;
use CIO\Entity\EntityInterface;
use CIO\Entity\RequestMethod;
use CIO\Request\Track\TrackBaseRequest;

class MergeCustomer extends TrackBaseRequest
{
    /** @var Customer */
    private $oldCustomer;

    /** @var Customer */
    private $newCustomer;

    public function __construct(EntityInterface $oldCustomer, EntityInterface $newCustomer)
    {
        assert($oldCustomer instanceof Customer);
        assert($newCustomer instanceof Customer);

        $this->oldCustomer = $oldCustomer;
        $this->newCustomer = $newCustomer;
    }

    public function getEndpoint() : string
    {
        return '/api/v1/merge_customers';
    }

    public function getMethod() : RequestMethod
    {
        return RequestMethod::POST();
    }

    public function getBody() : array
    {
        return [
            "primary" => ["email" => $this->newCustomer->getEmail()],
            "secondary" => ["email" => $this->oldCustomer->getEmail()]
        ];
    }
}
