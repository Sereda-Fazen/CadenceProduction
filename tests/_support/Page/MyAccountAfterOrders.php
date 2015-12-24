<?php
namespace Page;

use Exception;

class MyAccountAfterOrders
{

    /**
     * My Orders
     */

    public static $recentOrders = 'div.box-account.box-recent';
    public static $viewAll = '//*[@class="box-head"]/a';
    public static $showAll = 'div.my-account';
    public static $navigation = 'div.my-account > div:nth-of-type(3) > div.item-left > div.limiter > a:nth-of-type(3)';
    public static $back = 'p.back-link > a';
    public static $viewOrder = '//*[@class="nobr"]/a';
    public static $itemsOrders = 'div.order-items.order-details';
    public static $backMyOrders = 'p.back-link > a';
    public static $invoices = '#order-info-tabs > li.last';
    public static $waitInvoices = 'h2.sub-title';
    public static $reorder = '//*[@class="a-center last"]//a[2]';
    public static $error = 'li.error-msg';

    /**
     * Giff card
     */

    public static $giffCard = 'div.block-content > ul > li.last > a';
    public static $myBalance = 'div.gift-card > div:nth-of-type(1) > div:nth-of-type(1) > div.row > div:nth-of-type(1)';
    public static $viewGiff = 'View';
    public static $waitBlock = 'div.col-main';

    public static $removeCard2 = '//*[@class="giftvoucher-grid-detail"]/a[2]';
    public static $removeCard = '//*[@class="giftvoucher-grid-detail"]/a[4]';
    public static $msg = 'li.success-msg';

    //add

    public static $addGiffCard = '//*[@class="form-button button addredeem"]';
    public static $inputGiff = '#gift-voucher-code';
    public static $redeem = '//*[@class="col-xs-12 col-sm-8 text-left"]/button';
    public static $addToList = 'div.text-left > button:nth-of-type(2) > span > span';



    protected $tester;

    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }

    public function ordersDashboard (){
        $I = $this->tester;
        $I->waitForElement(self::$recentOrders,2);
        $I->scrollUp(200);
        $I->click(self::$viewAll);
        $I->waitForElement(self::$showAll,2);
        $I->scrollDown(200);
        $I->click(self::$navigation);
        $I->scrollDown(200);
        $I->click(self::$back);
        $I->click(self::$viewOrder);
        $I->waitForElement(self::$itemsOrders);
        $I->click(self::$invoices);
        $I->scrollDown(200);
        $I->waitForElement(self::$waitInvoices,2);
        $I->click(self::$back);
        $I->waitForElement(self::$reorder);
        $I->click(self::$reorder);
        $I->waitForElement(self::$error);
        $I->moveBack();

    }


    public function addGiffCardForOrdersRedeem ($giffCard)
    {
        $I = $this->tester;
        try { $I->click('.closeNewsletter'); } catch (Exception $e) {}
        $I->wait(2);
        $I->click(self::$giffCard);
        $I->waitForElement(self::$myBalance,2);
        $I->click(self::$addGiffCard);
        $I->fillField(self::$inputGiff, $giffCard);
        $I->click(self::$redeem);
        $I->waitForElement(self::$error);
        $I->see('GIFT-ADFA-12NF0F - The current balance of this gift code is 0.',self::$error);

    }
    public function addSameGiffCard($giffCard){
        $I = $this->tester;
        $I->fillField(self::$inputGiff, $giffCard);
        $I->click(self::$addToList);
        $I->waitForElement(self::$error);
        $I->see('This gift code has already existed in your list.',self::$error);
    }

    public function addGiffCard($giffCard){
        $I = $this->tester;
        try { $I->click('.closeNewsletter'); } catch (Exception $e) {}
        $I->wait(2);
        $I->fillField(self::$inputGiff, $giffCard);
        $I->click(self::$addToList);
        $I->waitForElement(self::$msg);
        $I->see('The gift code has been added to your list successfully.',self::$msg);
    }

    public function giffCardOfOrders ()
    {
        $I = $this->tester;
        $I->waitForText(self::$viewGiff);
        try { $I->click('.closeNewsletter'); } catch (Exception $e) {}
        $I->wait(2);
        $I->scrollDown(200);
        $I->click(self::$viewGiff);
        $I->waitForElement(self::$waitBlock);
        $I->moveBack();
        $I->click(self::$removeCard);
        $I->acceptPopup();
        $I->waitForElement(self::$msg);
        $I->see('Gift card was successfully removed',self::$msg);
        $I->click(self::$removeCard2);
        $I->acceptPopup();
        $I->waitForElement(self::$msg);
        $I->see('Gift card was successfully removed',self::$msg);

    }





}