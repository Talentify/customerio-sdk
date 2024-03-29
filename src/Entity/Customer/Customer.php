<?php

declare(strict_types=1);

namespace CIO\Entity\Customer;

use CIO\Entity\EntityInterface;
use CIO\Exception\InvalidEmail;

class Customer implements EntityInterface
{
    /**
     * @var \CIO\Entity\Customer\Identifier
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
     * @var mixed[]|null
     */
    private $attributes;

    /**
     * Customer constructor.
     *
     * @param \CIO\Entity\Customer\Identifier $identifier
     * @param string|null                     $email
     * @param int|null                        $createdAt
     * @param mixed[]|null                     $attributes
     *
     * @throws \Exception
     */
    public function __construct(
        Identifier $identifier,
        ?string $email = null,
        ?int $createdAt = null,
        ?array $attributes = []
    ) {
        if ($identifier->isEmail() && !is_null($email)) {
            throw new InvalidEmail("The email should be null when an identifier is an email");
        }

        if (!is_null($email) && !$this->isValidEmail($email)) {
            throw new InvalidEmail();
        }

        $this->identifier = $identifier;
        $this->email      = $email;
        $this->createdAt  = $createdAt;
        $this->attributes = $attributes;
    }

    /**
     * @return \CIO\Entity\Customer\Identifier
     */
    public function getIdentifier() : Identifier
    {
        return $this->identifier;
    }

    public function getEmail() : ?string
    {
        return $this->email;
    }

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

    /**
     * @return mixed[]
     */
    public function toArray() : array
    {
        $customer = [];

        if (!is_null($this->getCreatedAt())) {
            $customer["created_at"] = $this->getCreatedAt();
        }

        if (!$this->identifier->isEmail() && !is_null($this->getEmail())) {
            $customer['email'] = $this->getEmail();
        }

        foreach ($this->getAttributes() as $name => $value) {
            $customer[$name] = $value;
        }

        return $customer;
    }

    private function isValidEmail(?string $email) : bool
    {
        if (is_null($email)) {
            return false;
        }

        return (bool)filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
