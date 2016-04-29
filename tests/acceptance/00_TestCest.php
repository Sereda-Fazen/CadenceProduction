<?php

/**
 * @group test
 */
class TestCest
{


    function addToCartPagePayPal(Step\Acceptance\ItemsSteps  $I, Page\CheckoutPayPal $guestPage) {
        $I->processAddToCart();

        $guestPage->payPal();

        $guestPage->payPalSite();
        $I->comment('Expected result: You are have your order in PayPal');

    }


    




















}
