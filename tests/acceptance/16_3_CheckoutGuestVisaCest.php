<?php
use Step\Acceptance;
/**
 * @group checkoutCreditCard
 */
class CheckoutGuestVisaCest
{

    /**
     * Visa
     */


    function addToCartPageVisa(Step\Acceptance\ItemsSteps  $I,\Page\CheckoutGuestCreditCard $creditCardPageVisa)
    {
        $I->processAddToCart();

        $creditCardPageVisa->creditCard();
        $I->checkVisa();

        $creditCardPageVisa->orderViewAlert();
        $I->comment('Expected result: PayPal gateway has rejected request.');
    }






























}
