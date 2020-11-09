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

    public function testClientCanViewOnlyTheirServices()
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
        $response->assertDontSee('Create Service');
        $response->assertSee($machine_1->model);
        $response->assertDontSee($machine_2->model);
        $response->assertSee($service_1->failure);
        $response->assertDontSee($service_2->failure);

    }
    
    public function testClientCanViewAServiceOfThierOwn()
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
            ->get( route('services.show', $service_1->id) );
        
        $response->assertSuccessful();
        $response->assertSee('Service Information');
        $response->assertSee($machine_1->model);
        $response->assertSee($service_1->failure);
        $response->assertSee($service_1->description);
        $response->assertDontSee('Edit Service');
        $response->assertDontSee('Delete Service');
        
        $response = $this->actingAs($client_1)
            ->get( route('services.show', $service_2->id) );
        
        $response->assertForbidden();
    }

    public function testClientCanNotCreateServices()
    {
        $client = User::factory()->create(['role' => 'client']);
        $machine = Machine::factory()->create();

        $response = $this->actingAs($client)
                        ->get( route('services.create', $machine->id ) );

        $response->assertForbidden();
    }
    
    // ver porque tira redirect y no forbidden, mismo caso en test de maquina
    // public function testClientCantStoreAService()
    // {
    //     $client = User::factory()->create(['role' => 'client']);
    //     $machine = Machine::factory()->create();

    //     $response = $this->actingAs($client)
    //                     ->post( route('services.store') );

    //     $response->assertForbidden();
    // }

    public function testClientCanNotEditServices()
    {
        $client = User::factory()->create(['role' => 'client']);
        $machine = Machine::factory()->create();
        $service = Service::factory()->create(['machine_id' => $machine->id]);
        
        $response = $this->actingAs($client)
                        ->get( route('services.edit', $service->id ) );

        $response->assertForbidden();
    }

    public function testClientCanNotDeleteServices()
    {
        $client = User::factory()->create(['role' => 'client']);
        $machine = Machine::factory()->create();
        $service = Service::factory()->create(['machine_id' => $machine->id]);
        
        $response = $this->actingAs($client)
                        ->delete( route('services.destroy', $service->id ) );

        $response->assertForbidden();
        
    }

}
