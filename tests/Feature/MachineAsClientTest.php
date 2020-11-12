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
        $client = User::factory()->create(['role' => 'client']);
        $machine_1 = Machine::factory()->create(['user_id' => $client->id]);
        $machine_2 = Machine::factory()->create(['user_id' => $client->id]);
        
        $client_2 = User::factory()->create(['role' => 'client']);
        $machine_3 = Machine::factory()->create(['user_id' => $client_2->id]);
        $machine_4 = Machine::factory()->create(['user_id' => $client_2->id]);

        $response = $this->actingAs($client)
                        ->get( route('machines.index') );

        $response->assertSee('My Machines');
        $response->assertSee($machine_1->model);
        $response->assertSee($machine_2->model);
        
        $response->assertDontSee($machine_3->model);
        $response->assertDontSee($machine_4->model);

    }

    public function testClientCanNotCreateMachines()
    {
        $client = User::factory()->create(['role' => 'client']);
        
        $response = $this->actingAs($client)
                        ->get( route('machines.create' ) );

        $response->assertForbidden();
    }
    
    public function testClientCanNotStoreMachines()
    {
        $client = User::factory()->create(['role' => 'client']);
        $machine_data = Machine::factory()->make()->toArray();

        $response = $this->actingAs($client)
                        ->post( route('machines.store'), $machine_data );

        $response->assertForbidden();

        $this->assertDatabaseMissing('machines', $machine_data);
    }
   
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
