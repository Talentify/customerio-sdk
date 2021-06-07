<?php

declare(strict_types=1);

namespace CIO\Entity;

use CIO\Entity\Customer\Identifier;
use PHPUnit\Framework\TestCase;

class IdentifierTest extends TestCase
{
    public function testIdNumber()
    {
        $identifier = new Identifier("123");
        $this->assertEquals("123", $identifier->getId());
        $this->assertFalse($identifier->isEmail());
    }

    public function testIdNumberString()
    {
        $identifier = new Identifier("123");
        $this->assertEquals("123", $identifier->getId());
        $this->assertFalse($identifier->isEmail());
    }

    public function testIdValidEmail()
    {
        $identifier = new Identifier("teste@teste.com");
        $this->assertEquals("teste@teste.com", $identifier->getId());
        $this->assertTrue($identifier->isEmail());
    }
}
