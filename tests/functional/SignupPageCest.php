<?php

class SignupPageCest
{
    protected $formId = '#form-signup';

    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('site/signup');
    }

    public function openSignupPage(\FunctionalTester $I)
    {
        $I->see('Signup', 'h1');
        $I->see('Username', 'label');
        $I->see('Password', 'label');
        $I->see('Repeat password', 'label');
        $I->see('Email', 'label');
        $I->see('Signup', 'button[type="submit"]');
    }

    public function signupWithEmptyCredentials(\FunctionalTester $I)
    {
        $I->submitForm('#form-signup', []);
        $I->expectTo('see validations errors');
        $I->see('Username cannot be blank.');
        $I->see('Password cannot be blank.');
        $I->see('Email cannot be blank.');
    }

    public function signupSuccessfully(\FunctionalTester $I)
    {
        $I->submitForm($this->formId, [
            'SignupForm[username]' => 'tester',
            'SignupForm[password]' => 'tester_password',
            'SignupForm[password_repeat]' => 'tester_password',
            'SignupForm[email]' => 'tester.email@example.com',
        ]);

        $I->seeRecord('app\models\User', [
            'username' => 'tester',
            'email' => 'tester.email@example.com',
            'status' => \app\models\User::STATUS_INACTIVE
        ]);

        $I->seeEmailIsSent();
        $I->see('Thank you for registration. Please check your inbox for verification email.');
    }
}
