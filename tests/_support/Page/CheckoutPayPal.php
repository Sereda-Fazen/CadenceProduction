<?php
namespace Page;

class CheckoutPayPal
{

    /**
     * Payment Information
     */

    public static $waitPayPal = '#p_method_paypal_express';
    public static $payPalInfo = 'You will be redirected to the PayPal website.';

    public static $clickPay = '#payment-buttons-container > button.button.continueRed > span > span';


    /**
     * PayPal site
     */

    public static $payPalCart = '#transactionCart';
    public static $showCartPayPal = '#merchantName';


    protected $tester;

    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }

    public function payPal () {
        $I = $this->tester;


        $I->waitForElement(self::$waitPayPal,20);
        $I->click(self::$waitPayPal);
        $I->waitForText(self::$payPalInfo);

        $I->click(self::$clickPay);
        $I->waitForElement(self::$payPalCart,20);

    }

    public function payPalSite(){
        $I = $this->tester;

        $I->moveMouseOver(self::$payPalCart,20);
        $I->click(self::$payPalCart);
        $I->waitForElement(self::$showCartPayPal);

    }








































}