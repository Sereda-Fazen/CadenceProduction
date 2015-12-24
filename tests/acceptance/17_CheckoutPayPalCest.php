<?php
use Step\Acceptance;
/**
 * @group checkoutGuestPayPal
 */
class CheckoutPayPalCest
{
        /**
         * Giff Card
         */
        function addToCartPage(Step\Acceptance\ItemsSteps  $I, Page\CheckoutPayPal $guestPage) {
            $I->processAddToCart();

            $guestPage->payPal();

            $guestPage->payPalSite();
            $I->comment('Expected result: You are have your order in PayPal');

        }

























}
