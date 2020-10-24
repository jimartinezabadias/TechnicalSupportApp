<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    use DatabaseMigrations;


    public function testLogin()
    {
        
        $user = User::factory()->create([
            'email' => 'test@laravel.com',
            'password' => bcrypt('12345678')
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password','12345678')
                    ->press('LOGIN')
                    ->assertSee('My Machines');
        });

    }

    public function testLoginFail()
    {

        $user = User::factory()->create([
            'email' => 'test@laravel.com',
            'password' => bcrypt('123456789')
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password','12345678')
                    ->press('LOGIN')
                    ->assertSee('These credentials do not match our records.');
        });

    }
}
