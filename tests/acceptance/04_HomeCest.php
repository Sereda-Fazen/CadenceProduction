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

            $I->invalidURL();
            $I->comment('Expected result: Whoops, our bad...');

            $homePage->homePageSearch('Watch');
            $I->getVisibleText('h1', 'Search results for "watch"');
            $I->comment('Expected result: Search results for "Watch" ');

            $homePage->homeHeaderCart();
            $I->getVisibleText('You have no items in your shopping cart.');

            $homePage->homeSlide();
            $I->waitForElement('div.main');

            $homePage->homePageContent();
/*
            $homePage->homePageSubscription('sa@itsvit.org');
            $I->see('Thank you for your subscription.', 'li.success-msg');
*/
            $homePage->homePageFooter();
            $I->getFooterMenu();
            $I->getFooterMenu1();
            $I->getFooterMenu2();

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





