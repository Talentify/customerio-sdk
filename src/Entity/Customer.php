<?php

declare(strict_types=1);

namespace CIO\Entity;

class Customer
{
    /**
     * @var \CIO\Entity\Identifier
     */
    private $identifier;
    /**
     * @var string|null
     */
    private $email;
    /**
     * @var int|null
     */
    private $createdAt;
    /**
     * @var array
     */
    private $attributes;

    /**
     * Customer constructor.
     *
     * @param \CIO\Entity\Identifier $identifier
     * @param string|null            $email
     * @param int|null               $createdAt
     * @param array|null             $attributes
     *
     * @throws \Exception
     */
    public function __construct(
        Identifier $identifier,
        ?string $email = null,
        ?int $createdAt = null,
        ?array $attributes = []
    ) {
        if (!$identifier->isEmail() && is_null($email)) {
            throw new \Exception('A Customer should have an email or an identifier of type email');
        }

        $this->identifier = $identifier;
        $this->email      = $email; // todo - validate email
        $this->createdAt  = $createdAt;
        $this->attributes = $attributes;
    }

    /**
     * @return \CIO\Entity\Identifier
     */
    public function getIdentifier() : Identifier
    {
        return $this->identifier;
    }

    /**
     * @return mixed
     */
    public function getEmail() : ?string
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt() : ?int
    {
        return $this->createdAt;
    }

    /**
     * @return mixed[]
     */
    public function getAttributes() : array
    {
        return $this->attributes;
    }

    public function toArray() : array
    {
        $customer = [];

        if (!is_null($this->getCreatedAt())) {
            $customer["created_at"] = $this->getCreatedAt();
        }

        if (!$this->identifier->isEmail()) {
            $customer['email'] = $this->getEmail();
        }

        foreach ($this->getAttributes() as $name => $value) {
            $customer[$name] = $value;
        }

        return $customer;
    }
}
