<?php
/**
 * @group account
 */
class RegisterCest
{



    function registerSuccess(AcceptanceTester $I, \Page\Register $registerPage) {
            $login = rand().'@'.rand().'.ru';
            $registerPage->register('alex', 'sereda',$login,'123456','123456');
            $I->see('Thank you for registering with The Cadence Watch Company.', 'li.success-msg');
            $I->comment('You are registering to Cadence Watch Company.');
            $registerPage->logout();

        }
        function registerWrongEmail(AcceptanceTester $I, \Page\Register $registerPage) {
            $registerPage->register('alex', 'sereda','sereda222.ru','123456','123456');
            $I->see('Please enter a valid email address. For example johndoe@domain.com.','#advice-validate-email-email_address');
            $I->comment('Expected result: Please enter a valid email address');
        }

        function registerInvalidEmail(AcceptanceTester $I, \Page\Register $registerPage) {
            $registerPage->register('alex', 'sereda','dasas@sd.rty','123456','123456');
            $I->see('"Email" is not a valid hostname.','li.error-msg');
            $I->comment('Expected result: "Email" is not a valid hostname.');
        }

        function registerNotMatchPass(AcceptanceTester $I, \Page\Register $registerPage) {
            $registerPage->register('alex', 'sereda','fazen7@mail.ru','123456','12345');
            $I->see('Please make sure your passwords match.', '#advice-validate-cpassword-confirmation');
            $I->comment('Expected result: Please make sure your passwords match.');
        }

        function registerShortPass(AcceptanceTester $I, \Page\Register $registerPage) {
            $registerPage->register('alex', 'sereda','fazen7@mail.ru','1234','1234');
            $I->see('Please enter 6 or more characters. Leading or trailing spaces will be ignored.', '#advice-validate-password-password');
            $I->comment('Expected result: Please enter 6 or more characters.');
        }

        function registerEmptyFirstPass(AcceptanceTester $I, \Page\Register $registerPage) {
            $registerPage->register('alex', 'sereda','fazen7@mail.ru','','123456');
            $I->see('This is a required field.', '#advice-required-entry-password');
            $I->comment('Expected result: This is a required first field.');
        }

        function registerEmptySecondPass(AcceptanceTester $I, \Page\Register $registerPage) {
            $registerPage->register('alex', 'sereda','fazen7@mail.ru','123456','');
            $I->see('This is a required field.', '#advice-required-entry-confirmation');
            $I->comment('Expected result: This is a required second field.');
        }





















}
