<?php
use Step\Acceptance;
/**
 * @group checkoutCreditCard
 */
class CheckoutGuestMasterCardCest
{

    /**
     * Master Card
     */

    function addToCartPageMasterCard(Step\Acceptance\ItemsSteps  $I,\Page\CheckoutGuestCreditCard $creditCardPageVisa)
    {
        $I->processAddToCart();

        $creditCardPageVisa->creditCard();
        $I->checkMasterCard();

        $creditCardPageVisa->orderView();
        $I->comment('Expected result: PayPal gateway has rejected request.');
    }


































}
