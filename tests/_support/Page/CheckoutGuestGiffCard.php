<?php
namespace Page;

class CheckoutGuestGiffCard
{

    /**
     * Payment Information
     */

    public static $checkBox = '#giftvoucher';
    public static $wait = 'dt.form-group.giftvoucher';
    //public static $useGiffCard = 'dt.form-group.giftvoucher > label';
    public static $giffVoucher = '#giftvoucher_code';
    public static $giffAddClick = '#giftvoucher_add > span > span';
    public static $waitMsg = 'li > strong';
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

    public function paymentInformation($numGiffCard) {
        $I = $this->tester;

        $I->scrollDown(100);
        $I->waitForElementVisible(self::$checkBox, 10);
        $I->waitForElementVisible(self::$clickPay, 10);
        $I->scrollUp(200);
        $I->checkOption(self::$checkBox);
        $I->waitForElementVisible(self::$giffVoucher, 15);
        $I->fillField(self::$giffVoucher, $numGiffCard);
        $I->click(self::$giffAddClick);
        $I->waitForElementVisible(self::$waitMsg);
        $I->see('GIFT-XXXX-XXXXXX', self::$waitMsg);
        $I->click(self::$clickPay);
        $I->acceptPopup();
    }









































}