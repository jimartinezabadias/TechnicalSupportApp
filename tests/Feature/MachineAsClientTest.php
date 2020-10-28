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

    public function testClientCanViewTheirMachines()
    {
        $client = User::factory()->create(['role' => 'client']);
        
        $response = $this->actingAs($client)
                        ->get( route('machines.index') );

        $response->assertSee('My Machines');
        $response->assertSee('Create Machine');
    }

    public function testClientCanCreateAMachines()
    {
        $client = User::factory()->create(['role' => 'client']);
        
        $response = $this->actingAs($client)
                        ->get( route('machines.create' ) );

        $response->assertSee('Create Machine');
    }
    
    // public function testClientCanStoreMachines()
    // {
    //     $client = User::factory()->create(['role' => 'client']);
        
    //     $response = $this->actingAs($client)
    //                     ->get( route('machines.store' ) );

    //     $response->assertSee('Create Machine');
    // }

    public function testClientCanAccessTheirMachines()
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
    
}
