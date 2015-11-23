<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
            ->see('TROLOLOLO');
    }

    /**
     * Check login page.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->visit(route('auth.getLogin'))
            ->see('LOGIN');
    }

    /**
     * Check that a user without access go to login page.
     *
     * @return void
     */
    public function testUserWithoutAccesToResource()
    {
        $this->unlogged();
        $this->visit('/resource')
            ->seePageIs(route('auth.getLogin'))
            ->see('Login');
    }

    /**
     * Check that a user with access go to login page.
     *
     * @return void
     */
    public function testUserWithAccesToResource()
    {
        $this->logged();
        $this->visit('/resource')
            ->seePageIs('/resource');
    }

    public function logged()
    {
        Session::set("authenticated", true);
    }

    public function unlogged()
    {
        Session::set("authenticated", false);
    }

    public function atestLoginPageHaveRegisterLinkAndWorksOk()
    {
        $this->visit('/login')
            ->click('Register')
            ->seePageIs('/register');
    }

    public function atestPostLogin()
    {
        $this->visit('/login')
            ->type('pepito@mail.com','email')
            ->type('pepito','password')
            ->press('Login')
            ->seePageIs('/login');
    }

}