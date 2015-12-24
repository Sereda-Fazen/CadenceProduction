<?php
use \Step\Acceptance;
/**
 * @group account
 */
class ForgotPassCest {

    function forgotSuccess(Step\Acceptance\LoginSteps $I, \Page\ForgotPass $forgotPage){

      $forgotPage->forgot('cadence.test01@yahoo.com');
      $I->comment('Expected result: If there is an account associated with cadence.test01@yahoo.com you will receive an email with a link to reset your password.');

        $I->gMailAuth();
        $I->remoteWindow();

        $I->newPass();
        $I->comment('Expected result: Your password has been updated');
    }








}
