<?php
namespace Page;

class CheckoutUser
{




    public static $payPalInfo = 'You will be redirected to the PayPal website.';

    public static $clickPay = '#payment-buttons-container > button.button.continueRed > span > span';


    /**
     * PayPal site
     */

    public static $payPalCart = '#transactionCart';
    public static $showCartPayPal = 'div.transctionCartDetails';


    protected $tester;

    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }

    public function payPal () {
        $I = $this->tester;


        $I->waitForElement(self::$waitPayPal,3);
        $I->click(self::$waitPayPal);
        $I->waitForText(self::$payPalInfo);

        $I->click(self::$clickPay);
        $I->waitForElement(self::$payPalCart,10);

    }

    public function payPalSite(){
        $I = $this->tester;

        $I->moveMouseOver(self::$payPalCart, 3);
        $I->click(self::$payPalCart);
        $I->waitForElement(self::$showCartPayPal);

    }








































}