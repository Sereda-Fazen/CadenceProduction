<?php
use \Step\Acceptance;
/**
 * @group enterNewPass
 */
class EnterPassCest {


    function enterNewPass (Step\Acceptance\LoginSteps $I)
    {
        $I->gMailAuth();
        $I->remoteWindow();

        $I->newPass();
        $I->comment('Expected result: Your password has been updated');
    }







}
