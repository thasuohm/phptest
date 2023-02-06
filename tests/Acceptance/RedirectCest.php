<?php

use Codeception\Util\Locator;
use Tests\Support\AcceptanceTester;

class RedirectCest
{
    public function redirectWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/hello.php');
        $I->see('Test hello');
        $I->click('a.something');
        $I->amOnPage('/');
        $I->see('Calculator App!!');
        $I->fillField('input[name=number1]', 20);
        $I->selectOption('select[name=operation]', 'plus');
        $I->fillField(Locator::find('input', ['name' => 'number2']), 20);
        $I->click('Calculate');
        $I->see('20 plus 20 equals 40');
    }
}
