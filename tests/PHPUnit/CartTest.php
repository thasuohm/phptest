<?php

use App\Cart;
use PHPUnit\Framework\TestCase;


class CartTest extends TestCase
{
    protected $cart;

    protected function setUp(): void
    {
        $this->cart = new Cart();
    }

    protected function tearDown(): void
    {
        Cart::$tax = 1.2;
    }

    public function testTaxValueCanChange()
    {
        Cart::$tax = 1.5;
        $this->cart->price = 10;
        $netPrice = $this->cart->getNetPrice();
        $this->assertEquals(15, $netPrice);
    }


    public function testCorrectNetReturned()
    {
        $this->cart->price = 10;
        $netPrice = $this->cart->getNetPrice();
        $this->assertEquals(12, $netPrice);
    }

    public function testType()
    {
        try {
            $this->cart->addToPrice('hello');
        } catch (TypeError $error) {
            print_r($error->getMessage());
            $this->assertStringStartsWith('App\Cart::addToPrice():', $error->getMessage());
        }
    }
}
