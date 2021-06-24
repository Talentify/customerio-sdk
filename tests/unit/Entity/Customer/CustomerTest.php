<?php

namespace CIO\Entity\Customer;

use CIO\Exception\InvalidEmail;
use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    public function testIdentifierAsEmail()
    {
        $identifier = new Identifier("valid@email.com");
        $customer   = new Customer($identifier);
        $this->assertInstanceOf(Customer::class, $customer);
    }


    public function testIdentifierAsEmailWithIdenticalEmail()
    {
        $this->expectException(InvalidEmail::class);
        $identifier = new Identifier("valid@email.com");
        $customer   = new Customer($identifier, "valid@email.com");
    }

    public function testIdentifierAsEmailWithEmail()
    {
        $this->expectException(InvalidEmail::class);
        $identifier = new Identifier("valid@email.com");
        $customer   = new Customer($identifier, "another@email.com");
    }

    public function testInvalidEmail()
    {
        $this->expectException(InvalidEmail::class);
        $identifier = new Identifier("123");
        $customer   = new Customer($identifier, "invalid@email");
    }

    public function testValidEmail()
    {
        $email = "valid@email.com";
        $identifier = new Identifier("123");
        $customer   = new Customer($identifier, $email);
        $this->assertInstanceOf(Customer::class, $customer);
        $this->assertEquals(['email' => $email], $customer->toArray());
    }

    public function testEmailNull()
    {
        $identifier = new Identifier("123");
        $customer   = new Customer($identifier, null);
        $this->assertInstanceOf(Customer::class, $customer);
        $this->assertEquals([], $customer->toArray());
    }
}
