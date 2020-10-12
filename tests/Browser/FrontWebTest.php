<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Machine;
use App\Models\Service;

class FrontWebTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testFrontMachines()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('All Machines');
        });
    }
    
    public function testMachineHistory()
    {
        Machine::factory()
            ->has(Service::factory()->count(3))
            ->create();
        
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('View')
                ->assertPathIs('/machine-history/1');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('View')
                ->assertSee('Service Information');
        });

    }
}
