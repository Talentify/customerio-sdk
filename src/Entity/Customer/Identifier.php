<?php

declare(strict_types=1);

namespace CIO\Entity\Customer;

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
     */
    public function __construct($id, bool $isEmail = false)
    {
        $this->id      = $id;
        $this->isEmail = $isEmail;
    }

    /**
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return false
     */
    public function isEmail() : bool
    {
        return $this->isEmail;
    }

    public function __toString()
    {
        return (string)$this->getId();
    }
}
