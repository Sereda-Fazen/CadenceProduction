<?php

use Step\Acceptance;
/**
 * @group shoppingCart
 */
class ProductCardCest
{

    function productPage(Step\Acceptance\LoginSteps $I) {
        $I->productCart();
        $I->comment('Expected result: Go to product card');

        $I->checkImgItem();
        $I->comment('Expected result: Click on Img and zoom is working');

        $I->checkNewItem();

    }

}




