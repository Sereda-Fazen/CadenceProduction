<?php
namespace Step\Acceptance;

use Exception;

class ItemsSteps extends \AcceptanceTester
{






    public function subForm(){
        $I = $this;

        $I->fillField('//*[@id="newsletter"]', 'fazen7@mail.ru');
        $I->click('//*[@id="subs"]');
    }

    public function linksMen() {
        $I = $this;
        $countLinks = count($I->grabMultiple('//*[@id="sidenav"]/li[1]/ul/li'));
        for ($index = 1; $index < $countLinks; $index++) {
            $I->click('#sidenav > li:nth-of-type(1) > ul > li:nth-of-type('.$index.') > a');
            $I->waitForElement('div.category-products > div.toolbar > div.sorter > div.item-left > p.amount');

        }

    }
    /*
        public function allShowingItem()
        {
            $I = $this;
            $show = count($I->grabMultiple('//*[@class = "category-products"]/div[1]//a[@class="show_icon"]'));
            for ($showItem = 1; $showItem <= $show; $showItem++) {
                $I->click('div.category-products > div.toolbar > div.sorter > div.item-left > div.limiter > a:nth-of-type(' . $showItem . ')');
                $I->waitForElement('div.category-products > div.toolbar > div.sorter > div.item-left > p.amount', 2);

            }

        }
    */
    public function allShowingItem()
    {
        $I = $this;
        $I->click('div.category-products > div.toolbar > div.sorter > div.item-left > div.limiter > a:nth-of-type(1)');
        $I->waitForAjax(20);
        $I->scrollDown(100);
        $I->waitForElement('div.category-products > div.toolbar > div.pager > div.pages');
        $I->comment('Expected result: Showing of 12 items on one page ');

        $I->click('div.category-products > div.toolbar > div.sorter > div.item-left > div.limiter > a:nth-of-type(2)');

        $I->waitForAjax(20);
        $I->comment('Expected result Is not visible block with navigation');

        $I->click('div.category-products > div.toolbar > div.sorter > div.item-left > div.limiter > a:nth-of-type(3)');

        $I->waitForAjax(20);
        $I->comment('Expected result Is not block with navigation');

        $I->click('div.category-products > div.toolbar > div.sorter > div.item-left > div.limiter > a:nth-of-type(4)');

        $I->waitForAjax(20);
        $I->comment('Expected result: Showing of 64 items on one page ');

        $I->click('div.category-products > div.toolbar > div.sorter > div.item-left > div.limiter > a:nth-of-type(5)');

        $I->waitForAjax(20);
        $I->waitForElementNotVisible('div.category-products > div.toolbar > div.pager > div.pages');
        $I->comment('Expected result: Showing all items one page ');


    }


    public function checkSortBy()
    {
        $I = $this;
        /*
                $I->selectOption('.//select[@onchange]', 'Name');
                $I->waitForAjax(10);
                $I->scrollDown(50);
                $I->waitForText('A', 4, 'ul.products-grid.category-products-grid.columngrid.columngrid-adaptive.first.last.odd > li:nth-of-type(1) > div.product-content-wrapper > div.product-content > h3.product-name.single-line-name > a');
                $I->comment('Show category when - Name from A');
        */
        $I->scrollDown(100);
        $I->selectOption('.//select[@onchange]', 'Price: Low to High');
        $I->waitForAjax(20);
        $I->waitForElement('//*[@class="regular-price"]');
        $I->comment('Show category when - Price begins - min');

        $I->selectOption('.//select[@onchange]', 'Price: High to Low');
        $I->waitForAjax(20);
        $I->waitForElement('//*[@class="regular-price"]');
        $I->comment('Show category when - Price begins - max');
        /*
                $I->selectOption('.//select[@onchange]', 'Band Type');
                $I->waitForAjax(10);
                $I->scrollDown(50);
                $I->waitForElement('ul.products-grid.category-products-grid.columngrid.columngrid-adaptive.first.last.odd > li:nth-of-type(1) > div.product-content-wrapper > div.product-content > h3.product-name.single-line-name > a');
                if ($I->waitForElement('ul.products-grid.category-products-grid.columngrid.columngrid-adaptive.first.last.odd > li:nth-of-type(1) > div.product-content-wrapper > div.product-content > h3.product-name.single-line-name > a') == $I->waitForElement('ul.products-grid.category-products-grid.columngrid.columngrid-adaptive.first.last.odd > li:nth-of-type(2) > div.product-content-wrapper > div.product-content > div.vert > div.price-box > span.regular-price > span.price')){
                $I->comment('Show category when - Band type');}

                $I->selectOption('.//select[@onchange]', 'size');
                $I->waitForAjax(10);
                $I->scrollDown(50);
                $I->waitForElement('ul.products-grid.category-products-grid.columngrid.columngrid-adaptive.first.last.odd > li:nth-of-type(1) > div.product-content-wrapper > div.product-content > h3.product-name.single-line-name > a');
                $I->comment('Show category when - size');
        */
    }






    public function checkGridButtonsForItems ()
    {
        $I = $this;
        $I->scrollDown(100);
        $classics = count($I->grabMultiple('//ul[@class="products-grid category-products-grid columngrid columngrid-adaptive columngrid-3col first last odd"]/li'));
        for ($c = 1; $c <= $classics; $c++) {
            $I->moveMouseOver('ul.products-grid.category-products-grid.columngrid.columngrid-adaptive.first.last.odd > li:nth-of-type('.$c.') > div.product-image-wrapper > div.actions > div.btn-cart > button.button.btn-cart.ajx-cart > span > span');
            $I->waitForElement('ul.products-grid.category-products-grid.columngrid.columngrid-adaptive.first.last.odd > li:nth-of-type('.$c.') > div.product-image-wrapper > div.actions > div.btn-cart > button.button.btn-cart.ajx-cart > span > span',2);

        }

    }
    public function clickOnImg() {
        $I = $this;

        $I->click('div.toolbar-bottom > div.toolbar > div.pager > p.view-mode.item-left > a.list');
        $I->scrollDown(100);
        $I->waitForElement('#products-list > li:nth-of-type(1) > div.product-image-wrapper > a.product-image > img');

        $I->click('#products-list > li:nth-of-type(1) > div.product-image-wrapper > a.product-image > img');
        $I->waitForElement('li.product > strong');
        $I->click('ul.grid_full > li:nth-of-type(2) > a');
        $I->waitForElement('#products-list > li:nth-of-type(1) > div.product-image-wrapper > a.product-image > img',2);
    }
    public function clickOnImgCat() {
        $I = $this;

        $I->click('div.toolbar-bottom > div.toolbar > div.pager > p.view-mode.item-left > a.list');
        $I->scrollDown(100);
        $I->waitForElement('#products-list > li:nth-of-type(1) > div.product-image-wrapper > a.product-image > img');

        $I->click('#products-list > li:nth-of-type(1) > div.product-image-wrapper > a.product-image > img');
        $I->waitForElement('li.product > strong');
        $I->click('ul.grid_full > li:nth-of-type(3) > a');
        $I->waitForElement('#products-list > li:nth-of-type(1) > div.product-image-wrapper > a.product-image > img',2);
    }

    public function clickQuickView() {
        $I = $this;

        $I->scrollDown(100);
        $I->moveMouseOver('//*[@class="add-to-links addto-links-icons"]//li/a');
        $I->waitForElementVisible('//*[@class="tooltip"]');
        $I->click('//*[@class="tooltip"]');
        $I->waitForElement('a.fancybox-item.fancybox-close',4);
        $I->click('a.fancybox-item.fancybox-close');

    }


    public function checkForPriceItems(){
        $I = $this;
        $I->scrollDown(250);
        $I->waitForElement('[name="pricesliderleft"]',2);
        $I->fillField('[name="pricesliderleft"]',20 );
        $I->click('dt.block-title > strong > span');
        $I->waitForAjax(30);
        $I->waitForElement('dt.block-title > strong > span',2);

        $I->fillField('[name="pricesliderright"]', 40);
        $I->click('dt.block-title > strong > span');
        $I->waitForElement('dt.block-title > strong > span',10);
        $I->waitForAjax(20);
        $I->waitForElement('dt.block-title > strong > span',10);

        $I->waitForElement('ol > li',40);
        $I->waitForElement('div.actions > a',40);
        $I->click('div.actions > a');
        $I->waitForAjax(40);
        $I->waitForElementNotVisible('ol > li',40);


    }

    //Product card

    public function productCart()
    {
        $I = $this;
        $I->amOnPage('/');
        $I->click('div.owl-wrapper > div:first-child > div.item > div.product-image-wrapper > a.product-image > img.lazyOwl');
        $I->waitForElement('div.main', 10);

    }

    public function checkCountsForItem(){
        $I = $this;
        $I->click('tr.first.odd > td:nth-of-type(4) > div.quantity_counter > a.next.quantity');
        $I->click('button.button.btn-update > span > span');
        $I->click('tr.first.odd > td:nth-of-type(4) > div.quantity_counter > a.prev.quantity');
        $I->click('button.button.btn-update > span > span');
    }



    public function checkImgItem(){
        $I = $this;
        $countImg = count($I->grabMultiple('//*[@id="more-images-slider"]/li'));
        for ($i = 1; $i <= $countImg; $i++) {
            $I->click('#more-images-slider > li:nth-of-type('.$i.')');
            $this->waitForElement('img.gallery-image.visible',1);
        }
        $I->moveMouseOver('img.gallery-image.visible', 10,50);
        $I->waitForElement('div.zoomLens',2);
        $I->moveMouseOver('img.gallery-image.visible', 100,200);
        $I->waitForElement('div.zoomLens',2);
        $I->moveMouseOver('img.gallery-image.visible', 50,10);
        $I->waitForElement('div.zoomLens',2);
        $I->moveMouseOver('img.gallery-image.visible', 30,200);
        $I->waitForElement('div.zoomLens',2);


    }


    public function checkNewItem(){
        $I = $this;
        $I->scrollDown(1500);
        $count = count($I->grabMultiple('//*[@id="upsell"]/div[1]/div/div'));
        if ($count <= 4){
            $I->moveMouseOver('div.owl-wrapper > div:first-child > div.item > div.product-image-wrapper > div.actions > div.btn-cart > button.button.btn-cart.ajx-cart > span > span');
            $I->click('div.owl-wrapper > div:first-child > div.item > div.product-image-wrapper > div.actions > div.btn-cart > button.button.btn-cart.ajx-cart > span > span');
            $I->waitForElement('a.close.cart', 2);
            $I->click('a.close.cart');
            $I->waitForElement('div.main', 2);


        }
        else if ($count > 4){
            $I->click('div.owl-prev');
            $I->waitForElement('div.owl-wrapper > div:first-child > div.item > div.product-image-wrapper > a.product-image > img.lazyOwl', 2);
            $I->click('div.owl-next');
            $I->waitForElement('div.owl-wrapper > div:nth-of-type(5) > div.item > div.product-image-wrapper > a.product-image > img.lazyOwl', 2);
            $I->moveMouseOver('div.owl-wrapper > div:first-child > div.item > div.product-image-wrapper > div.actions > div.btn-cart > button.button.btn-cart.ajx-cart > span > span');
            $I->click('div.owl-wrapper > div:first-child > div.item > div.product-image-wrapper > div.actions > div.btn-cart > button.button.btn-cart.ajx-cart > span > span');
            $I->waitForElement('a.close.cart', 2);
            $I->click('a.close.cart');
            $I->waitForElement('div.main', 2);


        }



    }
    public function testAcceptPopup() {
        $I = $this;
        $I->amOnPage('/checkout/onepage/');
        $I->click('button.button.btn-checkout > span > span');
        $I->acceptPopup();
        $I->see('OK');
    }



    //GUEST

    public function processAddToCart()
    {
        $I = $this;
        $I->amOnPage('/');
        try { $I->click('.closeNewsletter'); } catch (Exception $e) {}
        $I->wait(2);
        //$I->subForm();

        $I->click('#mega-nav > li:nth-of-type(1) > a');
        $I->scrollDown(250);
        $I->moveMouseOver('ul.products-grid.category-products-grid.columngrid.columngrid-adaptive.first.last.odd > li:nth-of-type(2) > div.product-image-wrapper > a.product-image > img');
        $I->waitForElementVisible('ul.products-grid.category-products-grid.columngrid.columngrid-adaptive.first.last.odd > li:nth-of-type(2) > div.product-image-wrapper > div.actions > div.btn-cart > button.button.btn-cart.ajx-cart > span > span');
        $I->click('ul.products-grid.category-products-grid.columngrid.columngrid-adaptive.first.last.odd > li:nth-of-type(2) > div.product-image-wrapper > div.actions > div.btn-cart > button.button.btn-cart.ajx-cart > span > span');
        $I->waitForElement('a.close.continue');
        $I->click('a.close.cart');
        $I->comment('Expected result: Product was added to your shopping cart.');


        //checkoutShoppingCart


        $I->waitForElement('div.main',10);
        $I->comment('Expected result: Open page shopping cart');

        // checkout

        $I->click('button.button.btn-proceed-checkout.btn-checkout');
        $I->waitForElement('#onepage-guest-register-button', 10);
        $I->scrollDown(100);


        // checkBilling

        $I->click(['id' => 'onepage-guest-register-button']);
        $I->scrollDown(100);
        $billing = '#billing\3A ';
        $I->fillField($billing. 'firstname', 'alex');
        $I->fillField($billing. 'lastname', 'sereda');
        $I->fillField($billing. 'email', 'sa@itsvit.org');
        $I->fillField('#billing-new-address-form > fieldset > ul > li:nth-of-type(3) > div.input-box > input.input-text.required-entry', 'Dostoevskogo street 22V');
        $I->fillField($billing. 'city', 'Kharkov');
        $I->fillField($billing.'postcode', '1rr354');
        $I->fillField($billing.'postcode', '61007');
        $I->click('//*[@id="billing:country_id"]/option[231]');
        $I->fillField($billing.'region', 'Kharkov');
        $I->fillField($billing.'telephone', '80934568798');
        $I->click($billing.'use_for_shipping_yes');
        $I->scrollDown(100);
        $I->click('#billing-buttons-container > button.button.continueRed > span > span');
        $I->comment('Expected result: Go to the Shipping Method');

        // shippingMethod


        $I->waitForElementVisible('#shipping-method-buttons-container > button.button.continueRed > span > span',45);
        $I->click('#shipping-method-buttons-container > button.button.continueRed > span > span');
        $I->waitForElement('#checkout-step-payment');
        $I->comment('Expected result: Go to the Payment information');


    }

    /**
     * Check on validation
     */


    public function checkCardType()
    {
        $I = $this;

        //check empty all fields
        $I->waitForElementVisible('#payment-buttons-container > button.button.continueRed > span > span',10);
        $I->click('#p_method_paypal_direct');
        $I->click('#payment-buttons-container > button.button.continueRed > span > span');
        $I->waitForElementVisible('#payment-buttons-container > button.button.continueRed > span > span', 3);
        $I->scrollDown(200);
        $I->see('This is a required field.', '#advice-required-entry-paypal_direct_cc_type');
    }
    public function checkEmptyNumberCard()
    {
        $I = $this;
        // check only one field - card type

        $I->click('#paypal_direct_cc_type');
        $I->click('//*[@id="paypal_direct_cc_type"]/option[2]');
        $I->click('#payment-buttons-container > button.button.continueRed > span > span');
        $I->see('Card type does not match credit card number.', '#advice-validate-cc-type-select-paypal_direct_cc_type');
    }

    public function checkInvalidCardType()
    {
        $I = $this;
        //check number invalid
        $I->fillField('#paypal_direct_cc_number', '1234567');
        $I->click('#payment-buttons-container > button.button.continueRed > span > span');
        $I->see('Please enter a valid credit card number.', '#advice-validate-cc-number-paypal_direct_cc_number');
    }

    public function checkInvalidMonthWithYear()
    {
        $I = $this;

        // check month and year
        $I->click('#paypal_direct_expiration');
        $I->click('//*[@id="paypal_direct_expiration"]/option[2]');
        $I->click('#paypal_direct_expiration_yr');
        $I->click('//*[@id="paypal_direct_expiration_yr"]/option[2]');
        $I->click('#payment-buttons-container > button.button.continueRed > span > span');
        $I->see('Incorrect credit card expiration date.', '#advice-validate-cc-exp-paypal_direct_expiration');
    }

    public function checkInvalidVerificationNumber()
    {
        $I = $this;

        //check card verify

        $I->fillField('#paypal_direct_cc_cid', 'test');
        $I->scrollDown(100);
        $I->click('#payment-buttons-container > button.button.continueRed > span > span');
        $I->see('Please enter a valid credit card verification number.', '#advice-validate-cc-cvn-paypal_direct_cc_cid');
        $I->amOnPage('/');

    }


    public function checkAmericanExpress(){
        $I = $this;

        $I->click('#p_method_paypal_direct');

        // Cards
        $I->click('#paypal_direct_cc_type');
        $I->click('//*[@id="paypal_direct_cc_type"]/option[2]');
        $I->fillField('#paypal_direct_cc_number', '378282246310005');
        //  month
        $I->click('#paypal_direct_expiration');
        $I->click('//*[@id="paypal_direct_expiration"]/option[2]');
        //year
        $I->click('#paypal_direct_expiration_yr');
        $I->click('//*[@id="paypal_direct_expiration_yr"]/option[3]');
        //what is this
        $I->click('a.cvv-what-is-this');
        $I->waitForElement('div.tool-tip-content > img');
        $I->click('#payment-tool-tip-close');
        $I->fillField('#paypal_direct_cc_cid', '1234');
        //continue
        $I->click('#payment-buttons-container > button.button.continueRed > span > span');
        //$I->waitForElement('div.cart-empty > p:nth-of-type(1)',10);


    }

    public function checkVisa(){
        $I = $this;

        $I->click('#p_method_paypal_direct');

        // Cards
        $I->click('#paypal_direct_cc_type');
        $I->click('//*[@id="paypal_direct_cc_type"]/option[3]');
        $I->fillField('#paypal_direct_cc_number', '4012888888881881');
        //  month
        $I->click('#paypal_direct_expiration');
        $I->click('//*[@id="paypal_direct_expiration"]/option[2]');
        //year
        $I->click('#paypal_direct_expiration_yr');
        $I->click('//*[@id="paypal_direct_expiration_yr"]/option[3]');
        //what is this
        $I->click('a.cvv-what-is-this');
        $I->waitForElement('div.tool-tip-content > img');
        $I->click('#payment-tool-tip-close');
        $I->fillField('#paypal_direct_cc_cid', '123');
        //continue
        $I->click('#payment-buttons-container > button.button.continueRed > span > span');
        //$I->waitForElement('div.cart-empty > p:nth-of-type(1)',10);
    }


    public function checkMasterCard()
    {
        $I = $this;

        $I->click('#p_method_paypal_direct');

        // Cards
        $I->click('#paypal_direct_cc_type');
        $I->click('//*[@id="paypal_direct_cc_type"]/option[4]');
        $I->fillField('#paypal_direct_cc_number', '5105105105105100');
        //  month
        $I->click('#paypal_direct_expiration');
        $I->click('//*[@id="paypal_direct_expiration"]/option[2]');
        //year
        $I->click('#paypal_direct_expiration_yr');
        $I->click('//*[@id="paypal_direct_expiration_yr"]/option[3]');
        //what is this
        $I->click('a.cvv-what-is-this');
        $I->waitForElement('div.tool-tip-content > img');
        $I->click('#payment-tool-tip-close');
        $I->fillField('#paypal_direct_cc_cid', '957');
        //continue
        $I->click('#payment-buttons-container > button.button.continueRed > span > span');
      //  $I->waitForElement('div.cart-empty > p:nth-of-type(1)',10);
    }


}









