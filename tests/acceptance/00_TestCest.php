<?php

class TestCest
{


    function loginSuccess(AcceptanceTester $I, \Page\Login $loginPage) {
        $loginPage->login('cadence_test01@yahoo.com', '123456');
        $I->amOnPage('/customer/account/index/');
        $I->see('Hello, alex sereda!', 'p.hello > strong');
        $loginPage->logout();
    }



















}
