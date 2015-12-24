<?php
namespace Page;

use Exception;

class MainPages
{

    /**
     * Men
     */
    public static $URL = '/';
    public static $men = 'li.parent > a';
    public static $sell = '#sidenav > li:nth-of-type(4) > a > span:nth-of-type(2)';
    public static $msg = 'ul.products-grid.category-products-grid.columngrid.columngrid-adaptive.first.last.odd';


    /**
     * New
     */
    public static $newItems = '#sidenav > li:nth-of-type(1) > a > span:nth-of-type(2)';

    /**
     * Women
     */

    public static $women = '#mega-nav > li:nth-of-type(2) > a';
    public static $wait = 'ul.products-grid.category-products-grid.columngrid.columngrid-adaptive.first.last.odd';

    /**
     * Giff Card
     */

    public static $giffCard = '#sidenav > li:nth-of-type(5) > a > span:nth-of-type(2)';

    protected $tester;

    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }

    public function men()
    {
        $I = $this->tester;
        $I->amOnPage(self::$URL);
        try { $I->click('.closeNewsletter'); } catch (Exception $e) {}
        $I->wait(2);
        $I->click(self::$men);
    }
    public function newItems(){
        $I = $this->tester;
        $I->click(self::$newItems);
    }


    public function accessories()
    {
        $I = $this->tester;
        $I->click(self::$sell);
        $I->scrollDown(700);
        $I->waitForElement(self::$msg);
    }
    public function women(){
        $I = $this->tester;
        $I->click(self::$women);
        $I->waitForElement(self::$wait);
    }
    public function giffCard(){
        $I = $this->tester;
        $I->click(self::$giffCard);
    }



}