<?php
namespace Page;

use Exception;

class Login
{
    public static $URL = 'customer/account/login/';

    public static $email = '#email';
    public static $pass = '#pass';
    public static $submit = '[name="send"] > span > span';
    public static $logout = 'ul.links > li.last > a';

    protected $tester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function login($name, $password)
    {
        $I = $this->tester;

        $I->amOnPage(self::$URL);
        try { $I->click('.closeNewsletter'); } catch (Exception $e) {}
        $I->wait(2);
        $I->fillField(self::$email, $name);
        $I->fillField(self::$pass, $password);
        $I->click(self::$submit);

        return $this;
    }
    public function logout()
    {
        $I = $this->tester;
        $I->click(self::$logout);
        $I->wait(5);

    }


}