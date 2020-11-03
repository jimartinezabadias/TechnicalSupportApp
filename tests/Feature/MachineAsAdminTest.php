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
        $admin = User::factory()->create(['role' => 'admin']);
        
        $response = $this->actingAs($admin)
                        ->get( route('machines.index') );

        $response->assertSuccessful();
        $response->assertSee('All Machines');
    }

    public function testAdminCanCreateMachines()
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)
                        ->get( route('machines.create' ) );

        $response->assertSuccessful();
        $response->assertSee('Create Machine');
    }

    // Ver como pasarle una request al store
    //
    public function testAdminCanStoreMachines()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        
        $machine_data = Machine::factory()->newModel();

        // $this->assertEmpty(Machine::all()->toArray());

        $response = $this->actingAs($admin)
                        ->post( route('machines.store'), [
                            'owner' => $machine_data->owner,
                            'model' => $machine_data->model,
                            'trademark' => $machine_data->trademark,
                            'type' => $machine_data->type
                        ]);
        
        $machine = Machine::first();
        
        // $response->assertRedirect( route('machines.show', $machine->id) );
        // $response->assertSee($machine_data->owner);

        $response->assertRedirect();


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

        $clients_machine = $client->machines()->first();
        $other_machine = Machine::factory()->create();
        
        $response = $this->actingAs($admin)
            ->delete( route('machines.destroy', $clients_machine->id ) );

        $response->assertRedirect( route('machines.index') );
        
        $response = $this->actingAs($admin)
            ->delete( route('machines.destroy', $other_machine->id ) );
        
        $response->assertRedirect( route('machines.index') );
        // $response->assertSuccessful();
    }

    

}
