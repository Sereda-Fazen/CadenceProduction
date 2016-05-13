<?php

/**
 * @group test
 */
class TestCest
{


    function enterNewPass (Step\Acceptance\LoginSteps $I)
    {
        $I->gMailAuth();
        $I->remoteWindow();
        $I->newPass();
        $I->comment('Expected result: Your password has been updated');
    }

    function invalidRepeatPass (Step\Acceptance\LoginSteps $I)
    {
        $I->moveBack();
        $I->see('Your password reset link has expired.','li.error-msg');
        $I->comment('Expected result: Your password has been updated');
    }

























}
