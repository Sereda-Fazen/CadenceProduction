<?php
use Step\Acceptance;
/**
 * @group main
 */
class MainPagesCest
{

        function clickMenPages(Step\Acceptance\LoginSteps $I, \Page\MainPages $menPage) {
            $menPage->men();
            $I->linksMen();
            $menPage->sale();
            $menPage->women();
        }















}
