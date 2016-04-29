<?php

/**
 * @group test
 */
class TestCest
{


    function clickMenPage(\Page\MainPages $menPage, \Step\Acceptance\LoginSteps $I)
    {

        $menPage->men();
        $I->headerLinks();
        //$I->menLinks();
    }

    function otherPages(\Page\MainPages $menPage)
    {
        $menPage->newItems();
        $menPage->women();
        //  $menPage->accessories();
        $menPage->giffCard();
    }


















}
