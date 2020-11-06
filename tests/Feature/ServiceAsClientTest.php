<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\User;
use App\Models\Machine;
use App\Http\Requests\CreateMachineRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceAsClientTest extends TestCase
{

    public function testClientCanViewTheirServices()
    {
        $client_1 = User::factory()->create(['role' => 'client']);
        $machine_1 = Machine::factory()->create();
        $service_1 = Service::factory()->create(['machine_id' => $machine_1->id]);
        $client_1->machines()->save($machine_1);
        
        $client_2 = User::factory()->create(['role' => 'client']);
        $machine_2 = Machine::factory()->create();
        $service_2 = Service::factory()->create(['machine_id' => $machine_2->id]);
        $client_2->machines()->save($machine_2);
        
        $response = $this->actingAs($client_1)
                        ->get( route('services.index') );

        $response->assertSuccessful();
        $response->assertSee('My Services');
        $response->assertSee($machine_1->model);
        $response->assertDontSee($machine_2->model);

    }

}
