<?php
use Step\Acceptance;
/**
 * @group checkoutUser
 */
class MyAccountAfterOrdersCest


{

    function MyAccountOrders(Step\Acceptance\LoginSteps $I, \Page\MyAccountAfterOrders $MyAccountPage) {
        $I->stepsLoginIn();
        $MyAccountPage->ordersDashboard();
        $I->comment('Expected result: This product is currently out of stock');

        $MyAccountPage->addGiffCardForOrdersRedeem('GIFT-ADFA-12NF0F');
        $I->comment('Expected result: GIFT-ADFA-12NF0F - The current balance of this gift code is 0');

        $MyAccountPage->addSameGiffCard('GIFT-ADFA-12NF0O');
        $I->comment('Expected result: This gift code has already existed in your list');

        $MyAccountPage->addGiffCard('GIFT-ADFA-12NF0F');
        $I->comment('Expected result: The gift code has been added to your list successfully');

        $MyAccountPage->giffCardOfOrders();
        $I->comment('Expected result: Gift card was successfully removed');
        }




}

