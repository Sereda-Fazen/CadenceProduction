<?php
namespace Page;

class CheckoutGuestCreditCard
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
    public static $clickOrder = '#review-buttons-container > button.button.btn-checkout > span > span';
    public static $returnPayment = '#opc-payment > div.step-title > h2';

    public  static $alertMsg = 'PayPal gateway has rejected request.';

    protected $tester;

    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }

    public function creditCard(){
        $I = $this->tester;
        $I->waitForElementVisible(self::$creditCard,30);
    }
    public function orderView(){
        $I = $this->tester;

        $I->waitForElementVisible(self::$waitOrderView,60);
        $I->waitForElementVisible(self::$clickOrder,60);
        $I->scrollUp(100);
        $I->click(self::$returnPayment);

    }

    public function orderViewAlert(){
        $I = $this->tester;

        $I->waitForElementVisible(self::$clickOrder,30);
        $I->waitForElement(self::$clickOrder);
        $I->click(self::$clickOrder);
        $I->wait(15);
        $I->acceptPopup();

    }











































}