<?php

use PHPUnit\Framework\TestCase;
include "./User.php";

class UserTest extends TestCase
{
    
    public function setUp()
    {
        $this->user = new User("Driss","Bellaroussi",23,"adam.sow97@gmail.com");
    }

    public function testIsValid() {
        $this->assertTrue($this->user->isValid());
    }

    //firstname and lastname required
    public function testIsNotValidFirstname()
    {
        $this->user->set_firstname("");
        $this->user->set_lastname("");

        $this->assertFalse($this->user->isValid());
    }
    
    //correct email required
    public function testIsNotValidEmail()
    {
        $this->user->set_email("adam.sow97gmailcom");

        $this->assertFalse($this->user->isValid());
    }

    public function testIsNotValidAge()
    {
        $this->user->set_age(10);
        $this->assertFalse($this->user->isValid());
    }
    
    
}
