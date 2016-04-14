<?php

class TestCest
{


    function homeSearch(Step\Acceptance\LoginSteps $I, \Page\Home $homePage)
    {
        $homePage->homePageSearch('Watch');
        $I->getVisibleText('h1', 'Search results for "watch"');
        $I->comment('Expected result: Search results for "Watch" ');
    }


















}
