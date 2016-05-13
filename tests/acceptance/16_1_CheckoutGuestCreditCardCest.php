<?php
use Step\Acceptance;
/**
 * @group checkoutCreditCard
 */
class CheckoutGuestCreditCardCest
{
    /**
     * American Express
     **/

        function addToCartPageAmericanExpress(Step\Acceptance\ItemsSteps  $I,\Page\CheckoutGuestCreditCard $creditCardPageVisa)
        {
            $I->processAddToCart();

            $creditCardPageVisa->creditCard();
            $I->checkAmericanExpress();

            $creditCardPageVisa->orderView();
            $I->comment('Expected result: PayPal gateway has rejected request.');
            }
        }
































