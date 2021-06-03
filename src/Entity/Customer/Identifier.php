<?php

declare(strict_types=1);

namespace CIO\Entity\Customer;


class Identifier
{
    /**
     * should be a string or an email address
     *
     * @var string
     */
    private $id;

    /**
     * Identifier constructor.
     *
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return (string)$this->id;
    }

    public function isEmail(): bool
    {
        return (bool)filter_var($this->id,FILTER_VALIDATE_EMAIL);
    }

    public function __toString()
    {
        return $this->getId();
    }
}
