<?php

use PHPUnit\Framework\TestCase;
include "./Exchange.php";

class ExchangeTest extends TestCase
{
    private $owner;
    private $receiver;
    private $product;
    private $emailSender;
    private $dbConnection;
    private $exchange;
    
    protected function setUp()
    {
        //Make sure sendEmail methods doesn't stop the tests
        $this->emailSender = $this->createMock(EmailSender::class);
        $this->emailSender->expects($this->any())->method('sendEmail')->will($this->returnValue(true));

        $this->dbConnection = $this->createMock(DatabaseConnection::class);
        $this->dbConnection->expects($this->any())->method('saveExchange')->will($this->returnValue(true));

        $this->owner = $this->createMock(User::class, ["Sow", "Adam", 23, "adam.sow97@gmail.com"]);
        $this->receiver = $this->createMock(User::class, ["Belaroussi", "Driss", 10, "drissgmail.com"]);

        $this->product = new Product("t-shirt", $this->owner);
    }

    public function testSave()
    {
        $startDate = date('d-m-Y', time() + 60 * 60 * 24);

        $this->owner->expects($this->any())->method('isValid')->will($this->returnValue(true));
        $this->receiver->expects($this->any())->method('isValid')->will($this->returnValue(true));

        $this->exchange = new Exchange($this->receiver, $this->product, $this->owner, $startDate, "16-05-2019", $this->emailSender, $this->dbConnection);

        $this->assertTrue($this->exchange->save());
    }

    public function testSaveNotValid()
    {
        $this->owner->expects($this->any())->method('isValid')->will($this->returnValue(false));
        $this->receiver->expects($this->any())->method('isValid')->will($this->returnValue(true));

        $this->exchange = new Exchange($this->receiver, $this->product, $this->owner, "04-05-2019", "16-05-2019", $this->emailSender, $this->dbConnection);

        $this->assertFalse($this->exchange->save());
    }

    //method to test receiver's age 
    public function testIsReceiverMinor() 
    {
        $this->owner->expects($this->any())->method('isValid')->will($this->returnValue(true));
        $this->receiver->expects($this->any())->method('isValid')->will($this->returnValue(false));

        $this->exchange = new Exchange($this->receiver, $this->product, $this->owner, "04-05-2019", "16-05-2019", $this->emailSender, $this->dbConnection);

        $this->assertTrue($this->exchange->isMinorReceiver());
    }
    
    //method to test dates
    public function testAreDatesCorrect()
    {
        $yesterdayDate = date('d-m-Y', time() - 60 * 60 * 24);
        $this->exchange = new Exchange($this->receiver, $this->product, $this->owner, $yesterdayDate, "16-05-2019", $this->emailSender, $this->dbConnection);

        $this->assertFalse($this->exchange->AreDatesCorrect());
    }
}
