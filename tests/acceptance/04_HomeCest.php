<?php
use Step\Acceptance;
/**
 * @group main
 */
class HomeCest
{

        function homeHeader(Step\Acceptance\LoginSteps $I, \Page\Home $homePage)
        {
            $homePage->homePageHeader();
            $homePage->homePageMainMenu();
            $I->getHeaderMenu();
        }

        function invalidURL(Step\Acceptance\LoginSteps $I, \Page\Home $homePage)
        {
            $I->invalidURL();
            $I->comment('Expected result: Whoops, our bad...');
        }

        function homeSearch(Step\Acceptance\LoginSteps $I, \Page\Home $homePage)
        {
            $homePage->homePageSearch('Watch');
            $I->getVisibleText('h1', 'Search results for "watch"');
            $I->comment('Expected result: Search results for "Watch" ');
        }

        function homeHeaderCart(Step\Acceptance\LoginSteps $I, \Page\Home $homePage)
        {

            $homePage->homeHeaderCart();
            $I->getVisibleText('You have no items in your shopping cart.');
        }

        function homeContent(Step\Acceptance\LoginSteps $I, \Page\Home $homePage)
        {
           $homePage->homeSlide();
           $homePage->homePageContent();
        }
/*
        function homeSubscription(Step\Acceptance\LoginSteps $I, \Page\Home $homePage)
        {
            $homePage->homePageSubscription('cadence.test01@yahoo.com');
        }
*/
        function homeFooter(Step\Acceptance\LoginSteps $I, \Page\Home $homePage)
        {

            $homePage->homePageFooter();
            $I->getFooterMenu();
            $I->getFooterMenu1();
            $I->getFooterMenu2();
        }

        function homeFooterSocialLinks(Step\Acceptance\LoginSteps $I, \Page\Home $homePage)
        {

            $homePage->homeFooterFacebook();
            $I->getSecondOpen();
            $I->comment('Expected result: Page is open - Facebook ');

            $homePage->homeFooterTwiter();
            $I->getSecondOpen();
            $I->comment('Expected result: Page is open - Twitter ');

            $homePage->homeFooterPinterest();
            $I->getSecondOpen();
            $I->comment('Expected result: Page is open - Pinterest ');


            $homePage->homeFooterInstagram();
            $I->getSecondOpen();
            $I->comment('Expected result: Page is open - Instargam ');
        }


}





