<?php
namespace Page;

class ProductCard
{

    public static $URL = '/';

    public static $clickImg = 'tr.first.last.odd > td:nth-of-type(1) > a.product-image > img';
    public static $clickName = 'h2.product-name > a';

    public static $waitOrderView = '#opc-review';
    public static $clickOrder = 'button.button.btn-checkout > span > span';

    //add new Items in product cart


    protected $tester;

    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }

    public function orderView(){
        $I = $this->tester;

        $I->amOnPage(self::$URL);

    }

    public function checkShoppingCart() {
        $I = $this->tester;

        $I->click(self::$clickImg);
        $I->moveBack();
        $I->click(self::$clickName);
        $I->moveBack();
    }










































}