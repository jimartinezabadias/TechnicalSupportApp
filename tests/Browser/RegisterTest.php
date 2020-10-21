<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{

    /**
     * A Dusk test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function testRegister()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'register test name')
                    ->type('last_name', 'register test last name')
                    ->type('email', 'register_test@laravel.com')
                    ->type('password', '12345678')
                    ->type('password_confirmation', '12345678')
                    ->press('REGISTER')
                    ->assertSee('All Machines');
            
            $browser->visit('/user/profile')
                    ->assertSee('Last Name');
        });
    }
}
