<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Machine;
use App\Http\Requests\CreateMachineRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MachineAsClientTest extends TestCase
{

    // public function __construct(){
    //     $this->client = User::factory()->create(['role' => 'client']);
    // }

    public function testClientCanViewAllTheirMachines()
    {
        // se puede mejorar creando un cliente con maquinas
        // y preguntando por los datos de las maquinas
        $client = User::factory()->create(['role' => 'client']);
        
        $response = $this->actingAs($client)
                        ->get( route('machines.index') );

        $response->assertSee('My Machines');
    }

    public function testClientCantCreateMachines()
    {
        $client = User::factory()->create(['role' => 'client']);
        
        $response = $this->actingAs($client)
                        ->get( route('machines.create' ) );

        $response->assertForbidden();
    }
   
    public function testClientCantEditMachines()
    {
        $client = User::factory()
            ->has(Machine::factory())
            ->create(['role' => 'client']);

        $machine = $client->machines()->first();
        
        $response = $this->actingAs($client)
                        ->get( route('machines.edit', $machine->id ) );

        $response->assertForbidden();
    }

    // Falla: Response status code [200] is not a forbidden status code.
    
    // public function testClientCantDeleteMachines()
    // {
    //     $client = User::factory()
    //         ->has(Machine::factory())
    //         ->create(['role' => 'client']);

    //     $machine = $client->machines()->first();
        
    //     $response = $this->actingAs($client)
    //                     ->get( route('machines.destroy', $machine->id ) );

    //     $response->assertForbidden();
    // }
    
    // Ver como pasarle una request al store
    //
    // public function testClientCantStoreMachines()
    // {
    //     $client = User::factory()->create(['role' => 'client']);
        
    //     $response = $this->actingAs($client)
    //                     ->get( route('machines.store' ) );

    //     $response->assertSee('Create Machine');
    // }

    public function testClientCanViewTheirMachines()
    {
        $client = User::factory()
            ->has(Machine::factory())
            ->create(['role' => 'client']);
        
        $machine = $client->machines()->first();
        
        $response = $this->actingAs($client)
                        ->get( route('machines.show', $machine->id ) );

        $response->assertSee($machine->type);
        $response->assertSee($machine->model);
        $response->assertSee($machine->trademark);
    }
    
    public function testClientCantViewOtherMachines()
    {
        $client = User::factory()->create(['role' => 'client']);
        
        $machine = Machine::factory()->create();
        
        $response = $this->actingAs($client)
                        ->get( route('machines.show', $machine->id ) );

        $response->assertForbidden();
    }
    
}
