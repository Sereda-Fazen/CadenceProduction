<?php
namespace Page;

use Exception;

class Men
{
    public static $URL = '/';
    public static $men = 'li.parent > a';



    protected $tester;

    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }

    public function men() {
        $I = $this->tester;
        $I->amOnPage(self::$URL);
        try { $I->click('.closeNewsletter'); } catch (Exception $e) {}
        $I->wait(2);
        $I->click(self::$men);
    }
    public function returnMen(){
        $I=$this->tester;
        $I->moveBack();
    }


}