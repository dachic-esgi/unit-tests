<?php

use PHPUnit\Framework\TestCase;
include "./Calculatrice.php";

class Tests extends TestCase 
{
    public function testAdd()
    {
        $this->assertEquals(
            4,
            Calculatrice::add(2,2)
        );
    }

    public function testMul()
    {
        $this->assertEquals(
            0,
            Calculatrice::mul(0,9)
        );
    }
    
    public function testSub()
    {
        $this->assertEquals(
            10,
            Calculatrice::mul(20,10)
        );
    }

    public function testDiv()
    {
        // $this>expectException(Exception::class);
        // $this>expectExceptionMessage("Message");
        $this->assertEquals(
            "Divison par zéro impossible !",
            Calculatrice::div(1,0)
        );
        $this->assertEquals(
            0,
            Calculatrice::div(0,9)
        );

    }

    public function testAvg()
    {
        $this->assertEquals(
            73,
            Calculatrice::mul(9,9,55)
        );
        // vendor/bin/phpunit Tests
    }

}


//tearDown
//setUp
