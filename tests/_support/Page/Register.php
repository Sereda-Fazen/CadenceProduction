<?php
namespace Page;

use Exception;

class Register
{
    public static $URL = '/customer/account/login/';

    public static $createAccount = 'Create an Account';
    public static $firsName = '#firstname';
    public static $lastName = '#lastname';
    public static $email = '#email_address';
    public static $pass = '#password';
    public static $confirmation = '#confirmation';
    public static $submit = 'Submit';
    public static $logout = 'ul.links > li.last > a';

    protected $tester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function register($fName,$lName,$email, $pass1, $pass2)
    {
        $I = $this->tester;

        $I->amOnPage(self::$URL);
        try { $I->click('.closeNewsletter'); } catch (Exception $e) {}
        $I->wait(2);
        $I->click(self::$createAccount);
        $I->fillField(self::$firsName, $fName);
        $I->fillField(self::$lastName, $lName);
        $I->fillField(self::$email, $email);
        $I->fillField(self::$pass, $pass1);
        $I->fillField(self::$confirmation, $pass2);
        $I->click(self::$submit);

        return $this;
    }
    public function logout()
    {
        $I = $this->tester;
        $I->click(self::$logout);

    }

}