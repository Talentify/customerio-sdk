<?php

declare(strict_types=1);

namespace CIO\Request\Track\Event;

use CIO\Entity\Customer\Customer;
use CIO\Entity\Event\Event;
use CIO\Entity\RequestMethod;
use CIO\Request\Track\TrackBaseRequest;

class AddEvent extends TrackBaseRequest
{
    /** @var \CIO\Entity\Event\Event */
    private $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function getEndpoint() : string
    {
        return sprintf('/api/v1/customers/%s/events', $this->event->getCustomerIdentifier());
    }

    public function getMethod() : RequestMethod
    {
        return RequestMethod::POST();
    }

    public function getBody() : array
    {
        return $this->event->toArray();
    }
}
