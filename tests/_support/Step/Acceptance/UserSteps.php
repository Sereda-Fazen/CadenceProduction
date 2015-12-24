<?php
namespace Step\Acceptance;

use Exception;

class UserSteps extends \AcceptanceTester
{


    public function stepsLoginIn()
    {
        $I = $this;
        $I->amOnPage('/customer/account/login/');
        try { $I->click('.closeNewsletter'); } catch (Exception $e) {}
        $I->wait(2);
        $I->fillField('#email', 'cadence.test01@yahoo.com');
        $I->fillField('#pass', '123456');
        $I->click('Login');

    }


    public function userProcessCheckout()

    {
        $I = $this;
        $I->amOnPage('/');
        try {
            $I->click('.closeNewsletter');
        } catch (Exception $e) {
        }
        $I->click('li.parent > a');
        $I->scrollDown(250);
        $rand = rand(2,count($I->grabMultiple('//*[@class="category-products"]/ul/li')));
        $I->moveMouseOver('ul.products-grid.category-products-grid.columngrid.columngrid-adaptive.first.last.odd > li:nth-of-type('.$rand.') > div.product-image-wrapper > div.actions > div.btn-cart > button.button.btn-cart.ajx-cart > span > span');
        $I->waitForElementVisible('ul.products-grid.category-products-grid.columngrid.columngrid-adaptive.first.last.odd > li:nth-of-type('.$rand.') > div.product-image-wrapper > div.actions > div.btn-cart > button.button.btn-cart.ajx-cart > span > span');
        $I->click('ul.products-grid.category-products-grid.columngrid.columngrid-adaptive.first.last.odd > li:nth-of-type('.$rand.') > div.product-image-wrapper > div.actions > div.btn-cart > button.button.btn-cart.ajx-cart > span > span');
        $I->waitForElement('a.close.continue');
        $I->click('a.close.cart');
        $I->comment('Expected result: Product was added to your shopping cart.');


        //checkoutShoppingCart


        $I->waitForElement('div.main', 20);
        $I->comment('Expected result: Open page shopping cart');
        $I->click('button.button.btn-proceed-checkout.btn-checkout > span > span');
        $I->waitForElementVisible('#checkout-step-billing', 20);
        $I->click('#billing-buttons-container > button.button.continueRed > span > span');

        $I->waitForElementVisible('#checkout-step-shipping_method', 20);
        $I->click('#shipping-method-buttons-container > button.button.continueRed > span > span');


        $I->waitForElementVisible('#checkout-step-payment', 20);
        $I->waitForElement('#payment-buttons-container > button.button.continueRed > span > span', 20);
        $I->click('#payment-buttons-container > button.button.continueRed > span > span');

        $I->wait(2);
        $I->acceptPopup();
    }

    public function checkGiffCard(){
        $I = $this;

        $I->click('#giftvoucher');
        $I->waitForElementVisible('#giftvoucher_code',10);
        $I->fillField('#giftvoucher_code','GIFT-ADFA-12NF0O');
        $I->click('#giftvoucher_add > span > span');
            //$I->waitForElementVisible('li.giftvoucher-discount-code');
            $I->waitForElement('ul.success-msg');
            $I->see('No need to add any more Gift code.', 'ul.success-msg');
            $I->scrollDown(200);
            $I->waitForElementVisible('#payment-buttons-container > button.button.continueRed > span > span', 10);
            $I->click('#payment-buttons-container > button.button.continueRed > span > span');
            $I->waitForElementVisible('button.button.btn-checkout > span > span', 60);
            $I->click('button.button.btn-checkout > span > span');
            $I->waitForElementVisible('h1', 15);
        $I->waitForElement('h2.sub-title', 30);
        $I->see('Thank you for your purchase!', 'h2.sub-title');







        // $I->see('GIFT-XXXX-XXXXXX','li > strong');














/*
        } else if ($I->grabTextFrom('ul.success-msg > li') == 'No need to add any more Gift code.'){

            $I->scrollDown(200);
            $I->click('#payment-buttons-container > button.button.continueRed > span > span');
            $I->scrollDown(200);
            $I->waitForElementVisible('#checkout-step-review', 40);
            $I->waitForElement('button.button.btn-checkout > span > span', 10);

            $I->click('button.button.btn-checkout > span > span');

        }
*/


    }



















}










