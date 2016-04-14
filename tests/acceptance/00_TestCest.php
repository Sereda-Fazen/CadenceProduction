<?php

class TestCest
{


    function loginSuccess(AcceptanceTester $I, \Page\Login $loginPage) {
        $loginPage->login('cadence_watch01@yahoo.com', '123456');
        $I->amOnPage('/customer/account/index/');
        $I->see('Hello, alex sereda!', 'p.hello > strong');
        $loginPage->logout();
    }

    function MyAccountInfo(\Step\Acceptance\LoginSteps $I, \Page\MyAccount $myAccountPage)
    {
        $I->stepsLoginIn();
        $I->see('Hello, alex sereda!', 'p.hello > strong');

        $myAccountPage->accountInfo('alex', 'sereda', 'cadence_watch01@yahoo.com', '123456', '123456', '123456');
        $I->see('This customer email already exists', 'li.error-msg');

        $myAccountPage->accountInfo('', '', '', '', '', '');
        $I->see('This is a required field.', '#advice-required-entry-email');
        $I->comment('Expected result: These are required fields');

        $myAccountPage->accountInfo('alex', 'sereda', 'cadence.test01@yahoo.com', '123456', '123456', '123456');
        $I->see('The account information has been saved.', 'li.success-msg');

    }



















}
