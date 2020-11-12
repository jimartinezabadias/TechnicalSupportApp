<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Machine;
use App\Models\Service;
use App\Models\User;

class FrontWebTest extends DuskTestCase
{
    
    public function testFrontWeb()
    {
        $total_clients = User::where('role','client')->count();
        $total_machines = Machine::all()->count();
        $total_services = Service::all()->count();
        
        $this->browse(function (Browser $browser) use ($total_clients, $total_services, $total_machines){
            $browser->visit('/')
                    ->assertSeeIn('#total_clients', $total_clients)
                    ->assertSeeIn('#total_services', $total_services)
                    ->assertSeeIn('#total_machines', $total_machines);
        });
    }
    
}
