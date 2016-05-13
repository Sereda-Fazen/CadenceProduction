<?php
namespace Page;

class CheckoutPreOrder
{


    public static $URL = '/';
    public static $clickPreOrder = 'div.owl-wrapper > div:nth-of-type(2) > div.item > div.product-image-wrapper > div.actions > div.btn-cart > button.button.btn-cart.ajx-cart > span > span';
    public static $waitGoToCart = 'a.close.cart';
    public static $msg = 'p.item-msg.notice';

    /**
     * Checkout
     */

    public static $hover = 'span.icon-cart.first';
    public static $processCheckout = '//*[@id="cart-listing"]/div[3]/button[2]';
    public static $see = 'div.main';

    /**
     * Payment Information
     */

    public static $wait = 'dt.form-group.giftvoucher';
    public static $useGiffCard = 'dt.form-group.giftvoucher > label';
    public static $giffVoucher = '#giftvoucher_code';
    public static $giffAddClick = '#giftvoucher_add > span > span';
    public static $waitMsg = 'ul.success-msg';
    public static $clickPay = '#payment-buttons-container > button.button.continueRed > span > span';

    /**
     * Order
     */

    public static $waitOrderView = '#opc-review';
    public static $clickOrder = 'button.button.btn-checkout > span > span';

    public static $alertPop = 'There was an error processing your order.';

    protected $tester;

    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }

    public function preOrder(){
        $I = $this->tester;
        $I->amOnPage(self::$URL);
        $I->click(self::$clickPreOrder);
        $I->waitForElement(self::$waitGoToCart,2);
        $I->click(self::$waitGoToCart);
        $I->waitForElement(self::$msg);
    }

    public function checkout(){
        $I = $this->tester;
        $I->moveMouseOver(self::$hover);
        $I->click(self::$processCheckout);
        $I->waitForElement(self::$see);
    }



    public function paymentInformation ($numGiffCard) {
        $I = $this->tester;


        $I->waitForElement(self::$wait,3);
        $I->click(self::$useGiffCard);
        $I->waitForElementVisible(self::$giffVoucher, 5);
        $I->fillField(self::$giffVoucher, $numGiffCard);
        $I->click(self::$giffAddClick);
        $I->waitForElement(self::$waitMsg);
        $I->click(self::$clickPay);
        $I->waitForElementVisible(self::$waitOrderView,10);
    }

    public function orderView(){
        $I = $this->tester;

        $I->waitForElementVisible(self::$clickOrder, 8);
        $I->scrollDown(250);
        $I->click(self::$clickOrder);


    }







































}