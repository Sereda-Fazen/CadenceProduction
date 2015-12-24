<?php
namespace Page;

use Exception;

class MyAccount
{


    /**
     * Account Information
     */

    public static $URL = 'customer/account/edit';

    public static $firsName = '#firstname';
    public static $lastName = '#lastname';
    public static $email = '#email';
    public static $change = '#change_password';
    public static $current = '#current_password';
    public static $pass = '#password';
    public static $confirmation = '#confirmation';
    public static $submit = 'div.buttons-set > button.button';


    /**
     *  Address Book
     */

    public static $URL2 = 'customer/address/new/';


    public static $addressName = '#firstname';
    public static $addressLastName = '#lastname';
    public static $addressEmail = '#email_address';
    public static $phone = '#telephone';
    public static $street = 'ul.form-list > li:nth-of-type(1) > div.input-box > input.input-text.required-entry';
    public static $city = '#city';
    public static $zip = '#zip';
    public static $state = '//*[@id="country"]/option[231]';
    public static $region = '//*[@id="region"]';
    public static $submit2 = 'div.buttons-set > button.button > span > span';

    /**
     * My Orders
     */
    public static $URL3 = '/sales/order/history/';
    // after orders



    /**
     *  Billing Agreements
     */
    public static $URL4 = 'sales/billing_agreement/';

    public static $payment = '#payment_method';
    public static $payCheck = '//*[@id="payment_method"]/option[2]';
    public static $create = 'li > button.button > span > span';

    /**
     * Recurring Profiles
     */

    public static $URL5 = '/sales/recurring_profile/';


    /**
     * My Applications
     */

    public static $URL6 = '/oauth/customer_token/';


    /**
     * My Downloadable Products
     */
    public static $URL7 = '/downloadable/customer/products/';


    /**
     * Newsletter Subscriptions
     */

    public static $URL8 = '/monkey/customer_account/index/';

    public static $buttonSave = 'div.buttons-set > button.button > span > span';
    public static $clickCheck = 'input.monkey-list-subscriber';

    /**
     * Giff Card
     */
    public static $URL9 = '/giftvoucher/index/index/';

    public static $viewBlock = 'button.form-button.button.addredeem > span > span';
    // public static $clickHere = 'div.storecredit > div:nth-of-type(2) > a';
    // public static $redeem = 'div.button-add-list > button:nth-of-type(1) > span > span';

    protected $tester;

    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }


    public function accountInfo($fName,$lName,$email,$current, $pass1, $pass2) {
        $I = $this->tester;
        $I->amOnPage(self::$URL);
        try { $I->click('.closeNewsletter'); } catch (Exception $e) {}
        $I->wait(2);
        $I->fillField(self::$firsName, $fName);
        $I->fillField(self::$lastName, $lName);
        $I->fillField(self::$email, $email);
        $I->click(self::$change);
        $I->fillField(self::$current, $current);
        $I->fillField(self::$pass, $pass1);
        $I->fillField(self::$confirmation, $pass2);
        try { $I->click('.closeNewsletter'); } catch (Exception $e) {}
        $I->wait(2);
        $I->scrollDown(100);
        $I->click(self::$submit);
    }

    public function accountAddress($fName,$lName,$phone,$street, $region, $city, $zip) {
        $I = $this->tester;

        $I->amOnPage(self::$URL2);
        try { $I->click('.closeNewsletter'); } catch (Exception $e) {}
        $I->wait(2);
        $I->fillField(self::$firsName, $fName);
        $I->fillField(self::$lastName, $lName);
        $I->fillField(self::$phone, $phone);
        $I->fillField(self::$street, $street);
        $I->fillField(self::$city, $city);
        $I->fillField(self::$zip, $zip);
        $I->click(self::$state);
        $I->fillField(self::$region, $region);
        $I->scrollDown(100);
        $I->click(self::$submit2);
    }

    public function accountMyOrders() {
        $I = $this->tester;
        $I->amOnPage(self::$URL3);

    }

    public function accountBilling() {
        $I = $this->tester;

        $I->amOnPage(self::$URL4);
        $I->checkOption(self::$payment);
        $I->checkOption(self::$payCheck);
        $I->click(self::$create);
    }

    public function accountRecurring() {
        $I = $this->tester;

        $I->amOnPage(self::$URL5);

    }

    public function accountApplication() {
        $I = $this->tester;

        $I->amOnPage(self::$URL6);

    }

    public function accountDownloads() {
        $I = $this->tester;

        $I->amOnPage(self::$URL7);

    }

    public function accountNewsletterSave() {
        $I = $this->tester;

        $I->amOnPage(self::$URL8);
        $I->click(self::$buttonSave);
    }

    public function accountNewsletterDelete() {
        $I = $this->tester;

        $I->click(self::$clickCheck);
        $I->click(self::$buttonSave);
    }

    public function accountReturnChecks(){
        $I = $this->tester;

        $I->click(self::$clickCheck);
        $I->click(self::$buttonSave);
    }

    public function accountGiftCard(){
        $I = $this->tester;

        $I->amOnPage(self::$URL9);
        $I->click(self::$viewBlock);
        //  $I->click(self::$clickHere);
        //   $I->click(self::$redeem);

    }

}