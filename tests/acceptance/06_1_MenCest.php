<?php
use Step\Acceptance;
/**
 * @group category
 */
class MenCest
{

    function menPage(Step\Acceptance\ItemsSteps $I, \Page\Men $menPage)
    {
        $menPage->men();
        $I->checkForPriceItems();
        $I->comment('Expected result: Check the price');

        $I->allShowingItem();
        $I->comment('Expected result: Showing products and check select options');

        $I->checkSortBy();
        $I->comment('Expected result: Sorting is working');

        $I->checkGridButtonsForItems();
        $I->comment('Expected result: In the grid the buttons are active');

        $I->clickOnImg();
        $I->comment('Expected result: Navigate to product card ');

        $I->clickQuickView();
        $I->comment('Expected result: Quick view is open ');




    }
}
