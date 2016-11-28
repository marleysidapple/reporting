<?php

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */


    public function testLoginView()
    {
        $this->visit('/')
            ->see('Pathology Reporting')
            ->seePageIs('/');
    }

    public function testSuccessfulLoginAttempt()
    {
        $this->visit('/')
            ->type('operator@mail.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->seePageIs('/home')
            ->see('Operators')
            ->see('Patients')
            ->see('Reports');
    }

    public function testInvalidLoginAttempt()
    {
        $this->visit('/')
            ->press('Login')
            ->seeElement('div.has-error')
            ->see('The email field is required')
            ->see('The password field is required')
            ->type('test@admin.com', 'email')
            ->press('Login')
            ->seeElement('div.has-error')
            ->dontSee('The email field is required')
            ->see('The password field is required')
            ->type('', 'email')
            ->type('admin123', 'password')
            ->press('Login')
            ->see('The email field is required')
            ->dontSee('The password field is required');
    }

}
