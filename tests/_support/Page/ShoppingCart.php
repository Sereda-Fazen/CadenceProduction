<?php
namespace Page;

class ShoppingCart
{


    public static $URL = '/';

    public static $clickItem = 'div.owl-wrapper > div:first-child > div.item > div.product-image-wrapper > div.actions > div.btn-cart > button.button.btn-cart.ajx-cart > span > span';
    public static $goToCart = 'a.close.cart';
    public static $shoppingCart  = 'div.main';

    public static $clickEdit = 'tr.first.odd > td.last > a.btn-edit';


    //coupon

    public static $waitErr = '#advice-required-entry-coupon_code';
    public static $applyCoupon = 'div.buttons-set > button.button > span > span';
    public static $enterCoupon = '#coupon_code';

    public static $errorCoupon = 'li.error-msg';
    public static $success = 'li.success-msg';

    public static $discount = 'div.summary-collapse';
    public static $countDisc = 'tr.summary-details-amrules.summary-details > td:nth-of-type(2)';

    //giff card

    public static $checkGiff = '#giftvoucher';
    public static $applyGifCard = 'div.input-box > button.button.validation-passed > span > span';
    public static $errorValid = 'Please enter your code';

    public static $enterGiffCard = '#giftvoucher_code';

    public static $deleteGiffCard = 'ul > li > a > img';

    public static $cleanerItem = 'td.last > a.btn-remove';

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


        $I->amOnPage(self::$URL);
        $I->scrollDown(100);
        $I->waitForElementVisible(self::$clickItem);
        $I->click(self::$clickItem);
        $I->waitForElement(self::$goToCart);
        $I->click(self::$goToCart);
        $I->waitForElement(self::$shoppingCart,2);
    }

    public function checkEdit(){
        $I = $this->tester;
        $I->click(self::$clickEdit);
        $I->moveBack();
    }
    public function checkEmptyCouponCode() {
        $I = $this->tester;
        $I->click(self::$applyCoupon);
        $I->waitForElement(self::$waitErr, 2);
    }

    public function checkWrongCouponCod($coupon){
        $I = $this->tester;

        $I->fillField(self::$enterCoupon, $coupon);
        $I->click(self::$applyCoupon);
        $I->waitForElement(self::$errorCoupon,4);
    }

    public function checkCouponCod($coupon){
        $I = $this->tester;

        $I->fillField(self::$enterCoupon, $coupon);
        $I->click(self::$applyCoupon);
        $I->waitForElement(self::$success,4);
        $I->click(self::$discount);
        $I->waitForElement(self::$countDisc);

    }

    public function checkEmptyGiffCard(){
        $I = $this->tester;
        $I->scrollDown(200);
        $I->click(self::$checkGiff);
        $I->click(self::$applyGifCard);
        $I->waitForText(self::$errorValid, 2);
    }

    public function checkWrongGiffCard($text){
        $I = $this->tester;
        $I->scrollDown(200);
        $I->fillField(self::$enterGiffCard, $text);
        $I->click(self::$applyGifCard);
        $I->waitForElement(self::$errorCoupon,4);

    }
    public function checkGiffCard($text){
        $I = $this->tester;
        $I->scrollDown(200);
        $I->fillField(self::$enterGiffCard, $text);
        $I->click(self::$applyGifCard);
        $I->waitForElement(self::$success,4);
    }

    public function checkDeleteGiffCard(){
        $I = $this->tester;

        $I->scrollDown(200);
        $I->click(self::$deleteGiffCard);
        $I->waitForElement(self::$success,4);

    }

    public function removeItem(){
        $I = $this->tester;

        $I->click(self::$cleanerItem);
        $I->waitForElement(self::$success,2);

    }












































}