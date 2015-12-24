<?php
namespace Step\Acceptance;

use Exception;

class LoginSteps extends \AcceptanceTester
{


    public function deleteCookies(){
        $I= $this;
        $I->seeCookie('PHPSESSID');
        $I->resetCookie('dev1.cadencewatch.com');
        $I->reloadPage();
    }

    public function logOut(){
        $I= $this;
        $I->amOnPage('/');
        $I->click('ul.links > li.last > a');

    }

    public function stepsLoginIn()
    {
        $I = $this;
        $I->amOnPage('/customer/account/login/');
        try { $I->click('.closeNewsletter'); } catch (Exception $e) {}
        $I->wait(2);
        $I->fillField('#email', 'cadence.test01@yahoo.com');
        $I->wait(2);
        $I->fillField('#pass', '123456');
        $I->click('Login');

    }

    public function subForm(){
        $I = $this;

        $I->fillField('//*[@id="newsletter"]', 'fazen7@mail.ru');
        $I->click('//*[@id="subs"]');
    }

    /*
        public function StepsMyAccount()
        {
            $I = $this;
            $I->amOnPage('customer/account/edit/');
            $I->fillField('#firstname', 'sasha');
            $I->fillField('#middlename', 'alex');
            $I->fillField('#lastname', 'sereda');
            $I->fillField('#email', 'fazen7@mail.ru');
            $I->click('#change_password');
            $I->fillField('#current_password','123456');
            $I->fillField('#password','1234567');
            $I->fillField('#confirmation','1234567');
            $I->click('div.buttons-set > button.button > span > span');
        }
    */
    public function giftCardEmpty()
    {

        $I = $this;
        for ($c = 4; $c >= 0; $c--) {
            $card = rand();
            $I->fillField('#gift-voucher-code', $card);
            $I->click('div.text-left > button:nth-of-type(1) > span > span');
            $I->waitForText('Gift card "' . $card . '" is invalid.You have ' . $c . ' time(s) remaining to re-enter Gift Card code.', 3, '.error-msg');
        }
        $I->fillField('#gift-voucher-code', $card);
        $I->click('div.text-left > button:nth-of-type(1) > span > span');


    }

    //Header

    public function getHeaderMenu()
    {

        $I = $this;
        for ($i = 2; $i <= 5; $i++) {
            $I->click('#mega-nav > li:nth-of-type(' . $i . ') > a');
        }
        $I->click('li.home > a');
    }

    public  function invalidURL(){
        $I = $this;
        $I->amOnPage('/testWrong/');
        $I->waitForElement('h3',3);
        $I->moveBack();


    }

    public function getFooterMenu()
    {
        $I = $this;
        for ($i = 1; $i <= 3; $i++) {
            $I->scrollDown(1000);
            $I->click('div.footer-primary.footer > div:nth-of-type(1) > div.accordion.mobile-accordion > div.block-content > ul.list.bullet.separator > li:nth-of-type(' . $i . ') > a');

        }
    }
    public function getFooterMenu1()
    {
        $I = $this;
        for ($j = 1; $j <= 3; $j++) {
            $I->scrollDown(2000);
            $I->click('div.footer-primary.footer > div:nth-of-type(2) > div.accordion.mobile-accordion > div.block-content > ul.list.bullet.separator > li:nth-of-type(' . $j . ') > a');

        }


    }
    public function getFooterMenu2()
    {
        $I = $this;
        for ($k = 1; $k <= 2; $k++) {
            $I->scrollDown(1000);
            $I->click('div.footer-primary.footer > div:nth-of-type(3) > div.accordion.mobile-accordion > div.block-content > ul.list.bullet.separator > li:nth-of-type(' . $k . ') > a');

        }
        $I->click('span.closeNewsletter');
    }

    public function getSecondOpen() {

        $I = $this;
        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
            $handles = $webdriver->getWindowHandles();
            $last_window = end($handles);
            $webdriver->switchTo()->window($last_window);
        });


    }





    public function getZoom()
    {
        $I = $this;

        $rows = count($I->grabMultiple('//div/div[3]/ul'));
        for ($r = 1; $r <= $rows; $r++) {

            $cels = count($I->grabMultiple('//div/div[3]/ul[' . $r . ']/li'));
            for ($c = 1; $c <= $cels; $c++) {
                $I->moveMouseOver('//div/div[3]/ul[' . $r . ']/li[' . $c . ']', 70, 150);
                $I->moveMouseOver('//div/div[3]/ul[' . $r . ']/li[' . $c . ']', 150, 30);
                $I->moveMouseOver('//div/div[3]/ul[' . $r . ']/li[' . $c . ']', 30, 70);

            }
        }
    }

    public function inputBillingGuestData()
    {

        $billing = '#billing\3A ';
        $I = $this;
        $I->fillField($billing . 'firstname', 'alex');
        $I->fillField($billing . 'lastname', 'sereda');
        $I->fillField($billing . 'email', 'sa@itsvit.org');
        $I->fillField('input.input-text.required-entry.validate-length', 'Dostoevskogo street 22V');
        $I->fillField($billing . 'city', 'Kharkov');
        $I->fillField($billing . 'postcode', '1rr354');
        $I->fillField($billing . 'postcode', '61007');
        $I->click('//*[@id="billing:country_id"]/option[231]');
        $I->fillField($billing . 'region', 'Kharkov');
        $I->fillField($billing . 'telephone', '80934568798');
        $I->click($billing . 'use_for_shipping_yes');
        $I->click('#billing-buttons-container > button.button > span > span');


    }


    /*
    public function getHeaderMenu()
    {

        $I = $this;

        for ($i = 2; $i <= 9; $i++) {
            $I->click('#nav > li:nth-of-type(' . $i . ') > a.level-top > span');
            $rows = count($I->grabMultiple('//div/div[3]/ul'));
            for ($r = 1; $r <= $rows; $r++) {

                $cels = count($I->grabMultiple('//div/div[3]/ul[' . $r . ']/li'));
                for ($c = 1; $c <= $cels; $c++) {
                    $I->moveMouseOver('//div/div[3]/ul[' . $r . ']/li[' . $c . ']', 70, 150);
                    $I->moveMouseOver('//div/div[3]/ul[' . $r . ']/li[' . $c . ']', 150, 30);
                    $I->moveMouseOver('//div/div[3]/ul[' . $r . ']/li[' . $c . ']', 30, 70);

                }
            }

        }
        $I->click('li.last.level-top > a.level-top > span');
        $rows = count($I->grabMultiple('//div/div[3]/ul'));
        for ($s = 1; $s <= $rows; $s++) {

            $cels = count($I->grabMultiple('//div/div[3]/ul[' . $s . ']/li'));
            for ($c = 1; $c <= $cels; $c++) {
                $I->moveMouseOver('//div/div[3]/ul[' . $s . ']/li[' . $c . ']', 70, 150);
                $I->moveMouseOver('//div/div[3]/ul[' . $s . ']/li[' . $c . ']', 150, 30);
                $I->moveMouseOver('//div/div[3]/ul[' . $s . ']/li[' . $c . ']', 30, 70);
            }
        }
        $I->click('li.home > a');

        $I->click('li.first.level-top > a.level-top > span');
        $rows = count($I->grabMultiple('//div/div[3]/ul'));
        for ($s = 1; $s <= $rows; $s++) {

            $cels = count($I->grabMultiple('//div/div[3]/ul[' . $s . ']/li'));
            for ($c = 1; $c <= $cels; $c++) {
                $I->moveMouseOver('//div/div[3]/ul[' . $s . ']/li[' . $c . ']', 70, 150);
                $I->moveMouseOver('//div/div[3]/ul[' . $s . ']/li[' . $c . ']', 150, 30);
                $I->moveMouseOver('//div/div[3]/ul[' . $s . ']/li[' . $c . ']', 30, 70);
            }
        }
        $I->click('li.home > a');
    }
    */

    public function gMailAuth()
    {

        $I = $this;
        $I->amOnUrl("https://mail.yahoo.com");
        $I->fillField('//*[@id="login-username"]', 'cadence.test01@yahoo.com');
        $I->wait(2);
        $I->fillField('//*[@id="login-passwd"]', '!1qwerty');
        $I->wait(2);
        $I->click('//*[@id="login-signin"]');
        $I->waitForElement('//*[@class="icon info info-real info-unread "]',5);
        $I->see('Password Reset Confirmation', '//*[@class="subject bold"]');
        $I->click('//*[@class="subject bold"]');

    }

    public function remoteWindow(){
        $I = $this;
        $I->waitForText('RESET PASSWORD',5);
        $I->click('td > a > span');
        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
            $handles = $webdriver->getWindowHandles();
            $last_window = end($handles);
            $webdriver->switchTo()->window($last_window);
        });
    }

    public function newPass() {
        $I = $this;
        $I->waitForText('Reset a Password', 15, 'h1');
        $I->fillField('#password', '123456');
        $I->fillField('#confirmation', '123456');
        $I->click('Reset a Password');
        $I->see('Your password has been updated.', 'li.success-msg');

    }


    //pages

    public function menLinks(){
        $I = $this;
        $I->amOnPage('/');

        $I->click('li.parent > a');
    }



    public function linksMen() {
        $I = $this;
        $countLinks = count($I->grabMultiple('//*[@class="level0"]/li'));
        for ($index = 1; $index < $countLinks; $index++) {
            $I->click('#sidenav > li:nth-of-type(1) > ul > li:nth-of-type('.$index.') > a');
            $I->scrollDown(300);
            $I->waitForElement('ul.products-grid.category-products-grid.columngrid.columngrid-adaptive.first.last.odd');
        }


    }

    public function allShowingItem()
    {
        $I = $this;
        $show = count($I->grabMultiple('//*[@class = "category-products"]/div[1]//a[@class="show_icon "]'));
        for ($showItem = 1; $showItem <= $show; $showItem++) {
            $I->click('div.category-products > div.toolbar > div.sorter > div.item-left > div.limiter > a:nth-of-type(' . $showItem . ')');
            $I->waitForElement('div.category-products > div.toolbar > div.sorter > div.item-left > p.amount', 2);

        }

    }







    public function checkForPriceItems(){
        $I = $this;
        $I->scrollDown(50);
        $I->fillField('[name="pricesliderleft"]', 10);
        $I->waitForElement('dt.block-title > strong > span',2);
        $I->fillField('[name="pricesliderright"]', 30);
        $I->waitForElement('dt.block-title > strong > span',2);
        $I->click('dt.block-title > strong > span');
        $I->waitForElement('ol > li',2);


    }

    //Product card

    public function productCart()
    {
        $I = $this;
        $I->amOnPage('/');
        try { $I->click('.closeNewsletter'); } catch (Exception $e) {}
        $I->wait(2);
        //$I->subForm();
        $I->scrollDown(150);
        $I->click('div.owl-wrapper > div:nth-of-type(2) > div.item > div.product-content-wrapper > div.product-content > h3.product-name.single-line-name > a');

    }

    public function checkCountsForItem(){
        $I = $this;
            $I->click('tr.first.odd > td:nth-of-type(4) > div.quantity_counter > a.next.quantity');
            $I->scrollDown(100);
            $I->waitForElement('button.button.btn-update > span > span');
            $I->click('button.button.btn-update > span > span');
            $I->click('tr.first.odd > td:nth-of-type(4) > div.quantity_counter > a.prev.quantity');
            $I->scrollDown(100);
            $I->waitForElement('button.button.btn-update > span > span');
            $I->click('button.button.btn-update > span > span');
        }



    public function checkImgItem(){
        $I = $this;
        $countImg = count($I->grabMultiple('//*[@id="more-images-slider"]/li'));
        for ($i = 1; $i <= $countImg; $i++) {
            $I->click('#more-images-slider > li:nth-of-type(' . $i . ')');
            $this->waitForElement('img.gallery-image.visible', 1);
            $I->wait(2);
            $I->moveMouseOver('img.gallery-image.visible', 10, 50);
            $I->waitForElement('div.zoomLens', 2);
            $I->moveMouseOver('img.gallery-image.visible', 100, 200);
            $I->waitForElement('div.zoomLens', 2);
            $I->moveMouseOver('img.gallery-image.visible', 50, 10);
            $I->waitForElement('div.zoomLens', 2);
            $I->moveMouseOver('img.gallery-image.visible', 30, 200);
            $I->waitForElement('div.zoomLens', 2);
        }


    }


    public function checkNewItem(){
        $I = $this;
        $I->scrollDown(1500);
        $count = count($I->grabMultiple('//*[@id="upsell"]/div[1]/div/div'));
            if ($count <= 4){
                $I->moveMouseOver('div.owl-wrapper > div:first-child > div.item > div.product-image-wrapper > div.actions > div.btn-cart > button.button.btn-cart.ajx-cart > span > span');
                $I->click('div.owl-wrapper > div:first-child > div.item > div.product-image-wrapper > div.actions > div.btn-cart > button.button.btn-cart.ajx-cart > span > span');
                $I->waitForElement('a.close.cart');
                $I->click('a.close.cart');
                $I->waitForElement('div.main');


            }
            else if ($count > 4){
                $I->click('div.owl-prev');
                $I->waitForElement('div.owl-wrapper > div:first-child > div.item > div.product-image-wrapper > a.product-image > img.lazyOwl', 2);
                $I->click('div.owl-next');
                $I->waitForElement('div.owl-wrapper > div:nth-of-type(5) > div.item > div.product-image-wrapper > a.product-image > img.lazyOwl', 2);
                $I->moveMouseOver('div.owl-wrapper > div:first-child > div.item > div.product-image-wrapper > div.actions > div.btn-cart > button.button.btn-cart.ajx-cart > span > span');
                $I->click('div.owl-wrapper > div:first-child > div.item > div.product-image-wrapper > div.actions > div.btn-cart > button.button.btn-cart.ajx-cart > span > span');
                $I->waitForElement('a.close.cart');
                $I->click('a.close.cart');
                $I->waitForElement('div.main');


            }



    }
    public function testAcceptPopup() {
        $I = $this;
        $I->amOnPage('/checkout/onepage/');
        $I->click('button.button.btn-checkout > span > span');
        $I->acceptPopup();
        $I->see('OK');
    }



    public function waitAlertWindow ()
    {
        $I = $this;
        $count = count($I->grabMultiple('//*[@class="col-2 addresses-additional"]/ol/li'));
        for ($d = $count; $d > 0; $d--) {
            $I->click('ol > li:nth-of-type(' . $d . ') > p > a.link-remove');
            $I->acceptPopup();
            $I->waitForElement('li.success-msg');
        }


    }


}









