<?php

use Codeception\Util\Locator;
use Tests\Support\AcceptanceTester;

class FirstCest
{
    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Calculator App!!');
        $I->fillField(Locator::find('input', ['name' => 'number1']), 20);
        $I->selectOption(Locator::find('select', ['name' => 'operation']), 'minus');
        $I->fillField(Locator::find('input', ['name' => 'number2']), 20);
        $I->click('Calculate');
        $I->see('20 minus 20 equals 0');
    }
}
