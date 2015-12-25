<?php
use \Step\Acceptance;
/**
 * @group checkEnterNewPass
 */
class EnterPassCest {


    function enterNewPass (Step\Acceptance\LoginSteps $I)
    {
        $I->gMailAuth();
        $I->remoteWindow();
        $I->newPass();
        $I->comment('Expected result: Your password has been updated');
    }

    function deleteOldMsg(Step\Acceptance\LoginSteps $I, Page\ForgotPass $deleteMsg){
        $deleteMsg->deleteMsg();
        $I->comment('Expected result: Your message was deleted');

    }







}
