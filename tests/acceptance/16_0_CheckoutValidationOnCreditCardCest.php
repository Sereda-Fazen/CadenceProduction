<?php
use Step\Acceptance;
/**
 * @group checkoutCreditCard
 */
class CheckoutValidationOnCreditCardCest
{
    /**
     * American Express
     **/

        function checkOnValidationForCreditCard(Step\Acceptance\ItemsSteps  $I) {
            $I->processAddToCart();
            $I->comment('Expected result: Please specify payment method');

            $I->checkCardType();
            $I->comment('Expected result: Card type does not match credit card number');

            $I->checkEmptyNumberCard();
            $I->comment('Expected result: Card type does not match credit card number');

            $I->checkInvalidCardType();
            $I->comment('Expected result: Please enter a valid credit card number');

            $I->checkInvalidMonthWithYear();
            $I->comment('Expected result: Incorrect credit card expiration date');

            $I->checkInvalidVerificationNumber();
            $I->comment('Expected result: Please enter a valid credit card verification number');
        }





































}
