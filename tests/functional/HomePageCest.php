<?php

class HomePageCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('site/index');
    }

    public function homePageGuest(\FunctionalTester $I)
    {
        $I->see('Login', 'h1');
        $I->see('Username', 'label');
        $I->see('Password', 'label');
        $I->see('Remember Me', 'label');
        $I->see('Login', 'button[type="submit"]');
    }

    public function homePageLoggedIn(\FunctionalTester $I)
    {
        $I->amLoggedInAs(1);
        $I->see('Congratulations!', 'h1');
    }
}
