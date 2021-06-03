<?php

declare(strict_types=1);

namespace CIO\Entity\Customer;


use CIO\Exception\InvalidEmail;

class Identifier
{
    /**
     * should be an int or an email address
     *
     * @var int|string
     */
    private $id;

    /**
     * @var bool
     */
    private $isEmail;

    /**
     * Identifier constructor.
     *
     * @param string|int $id
     * @throws InvalidEmail
     */
    public function __construct($id)
    {
        $this->isEmail = false;

        if (!ctype_digit((string)$id)){
            if ($this->validateEmail($id)) {
                $this->isEmail = true;
            } else {
                throw new InvalidEmail();
            }
        }
        $this->id = $id;
    }

    public function getId(): string
    {
        return (string)$this->id;
    }

    public function isEmail(): bool
    {
        return $this->isEmail;
    }

    public function __toString()
    {
        return $this->getId();
    }

    private function validateEmail(string $email): bool
    {
        return (bool)filter_var($email,FILTER_VALIDATE_EMAIL);
    }
}
