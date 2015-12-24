<?php
namespace Page;

class CheckoutValidationOnCreditCard
{

    /**
     * Payment Information
     */

    public static $URL = '/';
    public static $creditCard = 'dl.sp-methods > dl.sp-methods';


    /**
     * Order
     */

    public static $waitOrderView = '#opc-review';
    public static $clickOrder = 'button.button.btn-checkout > span > span';
    public  static $alertMsg = 'PayPal gateway has rejected request.';

    protected $tester;

    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }

    public function creditCard(){
        $I = $this->tester;

        $I->waitForElementVisible(self::$creditCard,5);
    }
    public function orderView(){
        $I = $this->tester;

        $I->waitForElementVisible(self::$clickOrder,20);
        $I->scrollDown(250);
        $I->waitForElement(self::$clickOrder);
        $I->click(self::$clickOrder);
        $I->wait(5);
        $I->seeInPopup(self::$alertMsg);
    }











































}