<?php

use App\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{

    // Class
    public function testAdd()
    {
        $calculator = new Calculator();
        $result = $calculator->add(20, 5);
        $this->assertEquals(25, $result);
    }

    // Class
    public function testSubtract()
    {
        $calculator = new Calculator();
        $result = $calculator->subtract(20, 5);
        $this->assertEquals(15, $result);
    }

    // FUNCTION
    public function testStr()
    {
        $str1 = 'test';
        $str2 = 'test';
        $this->assertEquals($str1, $str2);
    }
}
