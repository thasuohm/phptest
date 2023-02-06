<?php


namespace Tests\Unit;

use App\Cart;
use Tests\Support\UnitTester;

class CartTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected $cart;

    protected function _before(): void
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
}
