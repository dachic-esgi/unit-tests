<?php

use PHPUnit\Framework\TestCase;
include "./User.php";
include "./Product.php";

class ProductTest extends TestCase
{
    protected function setUp()
    {
        $mockedOwner = $this->createMock(User::class, ["Adam", "Sow", "toto@gmail.com", 13]);
        $mockedOwner->expects($this->any())->method('isValid')->will($this->returnValue(true));

        $this->product = new Product("sweat", $mockedOwner);
    }
    
    public function testIsValid()
    {
        $this->assertTrue($this->product->isValid());
    }

    //TODO : add other methods to test class attributes
    public function testNameNotValid()
    {
        $this->product->set_name("");
        $this->assertFalse($this->product->isValid());
    }
}  
