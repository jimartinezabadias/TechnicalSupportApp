<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Machine;
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
        $admin = User::factory()->create(['role' => 'admin']);
        
        $response = $this->actingAs($admin)
                        ->get( route('machines.index') );

        $response->assertSuccessful();
        $response->assertSee('All Machines');
        // no le pude meter assert see por el paginado
    }

    public function testAdminCanCreateMachines()
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)
                        ->get( route('machines.create' ) );

        $response->assertSuccessful();
        $response->assertSee('Create Machine');
    }

    public function testAdminCanStoreMachines()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        
        $client = User::factory()->create(['role' => 'client']);
        $machine_data = Machine::factory()->make(['user_id' => $client->id])->toArray();

        $response = $this->actingAs($admin)
                        ->post( route('machines.store'), $machine_data);

        $response->assertRedirect();

        $this->assertDatabaseHas('machines', $machine_data);

    }

    public function testAdminCanViewAnyMachine()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        
        $client = User::factory()
            ->has(Machine::factory())
            ->create(['role' => 'client']);
        
        $clients_machine = $client->machines()->first();
        $other_machine = Machine::factory()->create();
        
        $response = $this->actingAs($admin)
                        ->get( route('machines.show', $clients_machine->id ) );

        $response->assertSuccessful();
        $response->assertSee($clients_machine->type);
        $response->assertSee($clients_machine->model);
        $response->assertSee($clients_machine->trademark);

        $response = $this->actingAs($admin)
                        ->get( route('machines.show', $other_machine->id ) );

        $response->assertSuccessful();
        $response->assertSee($other_machine->type);
        $response->assertSee($other_machine->model);
        $response->assertSee($other_machine->trademark);
    }

    public function testAdminCanEditAnyMachine()
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $client = User::factory()
            ->has(Machine::factory())
            ->create(['role' => 'client']);

        $clients_machine = $client->machines()->first();
        $other_machine = Machine::factory()->create();
        
        $response = $this->actingAs($admin)
                        ->get( route('machines.edit', $clients_machine->id ) );

        $response->assertSuccessful();
        
        $response = $this->actingAs($admin)
                        ->get( route('machines.edit', $other_machine->id ) );

        $response->assertSuccessful();


    }

    public function testAdminCanDeleteAnyMachines()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        
        $client = User::factory()
            ->has(Machine::factory())
            ->create(['role' => 'client']);

        $clients_machine = $client->machines()->first()->toArray();
        $other_machine = Machine::factory()->create()->toArray();
        
        $response = $this->actingAs($admin)
            ->delete( route('machines.destroy', $clients_machine['id']) );

        $response->assertRedirect( route('machines.index') );
        $this->assertDeleted('machines', $clients_machine);

        $response = $this->actingAs($admin)
            ->delete( route('machines.destroy', $other_machine['id'] ) );
        
        $response->assertRedirect( route('machines.index') );
        $this->assertDeleted('machines', $other_machine);
    }

    

}
