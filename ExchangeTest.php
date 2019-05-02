<?php

use PHPUnit\Framework\TestCase;
include "./Exchange.php";

class ExchangeTest extends TestCase
{
    protected function setUp()
    {
        //Make sure sendEmail methods doesn't stop the tests
        $mockedEmailSender = $this->createMock(EmailSender::class);
        $mockedEmailSender->expects($this->any())->method('sendEmail')->will($this->returnValue(true));

        $mockedDBConnection = $this->createMock(DatabaseConnection::class);
        $mockedDBConnection->expects($this->any())->method('saveExchange')->will($this->returnValue(true));

        $receiver = new User("Sow", "Adam", 21, "adam.sow97@gmail.com");
        $owner = new User("Belaroussi", "Driss", 23, "driss@gmail.com");
        $product = new Product("t-shirt", $owner);

        $this->exchange = new Exchange($receiver, $product, $owner, "04-05-2019", "16-05-2019", $mockedEmailSender, $mockedDBConnection);
    }

    public function testSave()
    {
        $this->assertTrue($this->exchange->save());
    }

    //method to test dates 

    //method 
}
