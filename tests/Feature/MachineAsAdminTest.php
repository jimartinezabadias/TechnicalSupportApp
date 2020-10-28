<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Machine;
use App\Http\Requests\CreateMachineRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MachineAsAdminTest extends TestCase
{

    // public function __construct(){
    //     $this->client = User::factory()->create(['role' => 'client']);
    // }

    public function testAdminCanViewAllMachines()
    {
        $client = User::factory()->create(['role' => 'admin']);
        
        $response = $this->actingAs($client)
                        ->get( route('machines.index') );

        $response->assertSee('All Machines');
        $response->assertSee('Create Machine');
    }

    public function testAdminCanCreateAMachines()
    {
        $client = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($client)
                        ->get( route('machines.create' ) );

        $response->assertSee('Create Machine');
    }
    
    // public function testAdminCanStoreMachines()
    // {
    //     $client = User::factory()->create(['role' => 'client']);
        
    //     $response = $this->actingAs($client)
    //                     ->get( route('machines.store' ) );

    //     $response->assertSee('Create Machine');
    // }

    // public function testClientCanAccessTheirMachines()
    // {
    //     $client = User::factory()->create(['role' => 'client']);
    //     $machine = Machine::factory()->create();
        
    //     $machine->user()->associate($client);
        
    //     $response = $this->actingAs($client)
    //                     ->get( route('machines.show', $machine->id ) );

    //     $response->assertSee($machine->type);
    //     $response->assertSee($machine->model);
    //     $response->assertSee($machine->trademark);
    // }
    
}
