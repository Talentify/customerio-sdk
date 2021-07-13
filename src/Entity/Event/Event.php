<?php

declare(strict_types=1);

namespace CIO\Entity\Event;

use CIO\Entity\Customer\Identifier;
use CIO\Exception\InvalidName;

class Event
{
    /**
     * @var \CIO\Entity\Customer\Identifier
     */
    private $customerIdentifier;

    /**
     * @var string
     */
    private $name;

    /**
     * @var mixed[]|null
     */
    private $attributes;

    /**
     * Event constructor.
     *
     * @param \CIO\Entity\Customer\Identifier $customerIdentifier
     * @param string                          $name
     * @param mixed[]|null                    $attributes
     *
     * @throws \Exception
     */
    public function __construct(
        Identifier $customerIdentifier,
        string $name,
        ?array $attributes = []
    ) {
        if (empty($name)) {
            throw new InvalidName("Name can't be empty.");
        }

        $this->customerIdentifier = $customerIdentifier;
        $this->name               = $name;
        $this->attributes         = $attributes;
    }

    /**
     * @return \CIO\Entity\Customer\Identifier
     */
    public function getCustomerIdentifier() : Identifier
    {
        return $this->customerIdentifier;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return mixed[]
     */
    public function getAttributes() : array
    {
        return $this->attributes;
    }

    /**
     * @return mixed[]
     */
    public function toArray() : array
    {
        $event = [
            'name' => $this->getName()
        ];

        foreach ($this->getAttributes() as $name => $value) {
            $event['data'][$name] = $value;
        }

        return $event;
    }
}
