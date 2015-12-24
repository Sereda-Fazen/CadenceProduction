<?php

use Step\Acceptance;
/**
 * @group shoppingCart
 */
class ShoppingCartCest
{

    function checkFunctionalShoppingCart(Step\Acceptance\LoginSteps  $I, \Page\ShoppingCart $shoppingCart)
    {

        $shoppingCart->checkShoppingCart();
        $I->comment('Expected result: Links are working');

        $I->checkCountsForItem();
        $I->comment('Expected result: Count is working plus and minus');

        $shoppingCart->checkEdit();
        $I->comment('Expected result: Page is open "Edit" items');

        $shoppingCart->checkEmptyCouponCode();
        $I->comment('Expected result: This is a required field.');

        $shoppingCart->checkWrongCouponCod('test');
        $I->comment('Expected result: Coupon code "test" is not valid.');
/*
        $shoppingCart->checkCouponCod('HOLIDAY');
        $I->comment('Expected result: Coupon code "HOLIDAY" was applied.');
*/
        $shoppingCart->checkEmptyGiffCard();
        $I->comment('Expected result: Please enter your code');

        $shoppingCart->checkWrongGiffCard('test');
        $I->comment('Expected result: Gift card "test" is invalid.');

        $shoppingCart->checkGiffCard('GIFT-ADFA-12NF0O');
        $I->comment('Expected result: Gift code "GIFT-XXXX-XXXXXX" has been applied successfully.');

        $shoppingCart->checkDeleteGiffCard();
        $I->comment('Expected result: Your Gift Card information has been removed successfully.');

        $shoppingCart-> removeItem();
        $I->comment('Expected result: You have no items in your shopping cart.');

    }


}




