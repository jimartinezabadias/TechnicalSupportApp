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
        // mejorar creando un cliente con maquinas
        // y preguntando por los datos de las maquinas
        $client = User::factory()->create(['role' => 'client']);
        
        $response = $this->actingAs($client)
                        ->get( route('machines.index') );

        $response->assertSee('My Machines');
    }

    public function testClientCanNotCreateMachines()
    {
        $client = User::factory()->create(['role' => 'client']);
        
        $response = $this->actingAs($client)
                        ->get( route('machines.create' ) );

        $response->assertForbidden();
    }
    
    // ver porque no tira forbidden
    // public function testClientCantStoreMachines()
    // {
    //     $client = User::factory()->create(['role' => 'client']);
        
    //     $response = $this->actingAs($client)
    //                     ->post( route('machines.store' ) );

    //     $response->assertForbidden();
    // }
   
    public function testClientCanNotEditMachines()
    {
        $client = User::factory()
            ->has(Machine::factory())
            ->create(['role' => 'client']);

        $machine = $client->machines()->first();
        
        $response = $this->actingAs($client)
                        ->get( route('machines.edit', $machine->id ) );

        $response->assertForbidden();
    }
    
    public function testClientCanNotDeleteMachines()
    {
        $client = User::factory()
            ->has(Machine::factory())
            ->create(['role' => 'client']);

        $machine = $client->machines()->first();

        $other_machine = Machine::factory()->create();
        
        $response = $this->actingAs($client)
                        ->delete( route('machines.destroy', $machine->id ) );

        $response->assertForbidden();
        
        $response = $this->actingAs($client)
                        ->delete( route('machines.destroy', $other_machine->id ) );

        $response->assertForbidden();
    }

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
    
    public function testClientCanNotViewOtherMachines()
    {
        $client = User::factory()->create(['role' => 'client']);
        
        $machine = Machine::factory()->create();
        
        $response = $this->actingAs($client)
                        ->get( route('machines.show', $machine->id ) );

        $response->assertForbidden();
    }
    
}
