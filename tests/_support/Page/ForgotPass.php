<?php
namespace Page;

class ForgotPass
{
    public static $URL = '/customer/account/login/';

    public static $forgotLink = 'a.f-left';
    public static $mail = '#email_address';
    public static $subSave = 'div.buttons-set > button.button > span > span';

    public static $msg = 'li.success-msg';



    protected $tester;

    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }

    public function forgot($mailPass) {
        $I = $this->tester;

        $I->amOnPage(self::$URL);
        $I->click(self::$forgotLink);
        $I->click(self::$mail);
        $I->fillField(self::$mail, $mailPass);
        $I->click(self::$subSave);
        $I->see('If there is an account associated with cadence.test01@yahoo.com you will receive an email with a link to reset your password.', self::$msg);
    }

}