<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\User;
use App\Models\Machine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceAsAdminTest extends TestCase
{

    public function testAdminCanViewAllServices()
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)
                        ->get( route('services.index') );

        $response->assertSuccessful();
        $response->assertSee('All Services');
        // no le pude meter assert see por el paginado

    }

    public function testAdminCanViewAnyService()
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $client_1 = User::factory()->create(['role' => 'client']);
        $machine_1 = Machine::factory()->create();
        $service_1 = Service::factory()->create(['machine_id' => $machine_1->id]);
        $client_1->machines()->save($machine_1);
        
        $client_2 = User::factory()->create(['role' => 'client']);
        $machine_2 = Machine::factory()->create();
        $service_2 = Service::factory()->create(['machine_id' => $machine_2->id]);
        $client_2->machines()->save($machine_2);
        
        $response = $this->actingAs($admin)
            ->get( route('services.show', $service_1->id) );
        
        $response->assertSuccessful();
        $response->assertSee('Service Information');
        $response->assertSee($machine_1->model);
        $response->assertSee($service_1->failure);
        $response->assertSee($service_1->description);
        $response->assertSee('Edit Service');
        $response->assertSee('Delete Service');
        
        $response = $this->actingAs($admin)
        ->get( route('services.show', $service_2->id) );
        
        $response->assertSuccessful();
        $response->assertSee('Service Information');
        $response->assertSee($machine_2->model);
        $response->assertSee($service_2->failure);
        $response->assertSee($service_2->description);
        $response->assertSee('Edit Service');
        $response->assertSee('Delete Service');
    }


    public function testAdminCanCreateAService()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        
        $machine = Machine::factory()->create();

        $response = $this->actingAs($admin)
                        ->get( route('services.create', $machine->id ) );

        $response->assertSuccessful();
        $response->assertSee('Create Service');
        $response->assertSee($machine->owner);
        $response->assertSee($machine->model);

    }

    public function testAdminCanStoreAService()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        
        $client = User::factory()->create(['role' => 'client']);
        $machine = Machine::factory()->create(['user_id' => $client->id]);

        $service_data = Service::factory()->make(['machine_id' => $machine->id])->toArray();

        $response = $this->actingAs($admin)
                        ->post( route('services.store'), $service_data );
        
        $response->assertRedirect();

        $this->assertDatabaseHas('services', $service_data);

    }

    public function testAdminCanEditAnyService()
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $client = User::factory()->create(['role' => 'client']);
        $machine = Machine::factory()->create();
        $service = Service::factory()->create(['machine_id' => $machine->id]);
        
        
        $response = $this->actingAs($admin)
            ->get( route('services.edit', $service->id ) );
        
        $response->assertSuccessful();
        $response->assertSee($machine->owner);
        $response->assertSee($machine->model);
        $response->assertSee($service->failure);
        $response->assertSee($service->description);
        
        $service_2 = Service::factory()->create();
        
        $response = $this->actingAs($admin)
            ->get( route('services.edit', $service_2->id ) );
        
        $response->assertSuccessful();
        $response->assertSee($service_2->machine->owner);
        $response->assertSee($service_2->machine->model);
        $response->assertSee($service_2->failure);
        $response->assertSee($service_2->description);

    }

    public function testAdminCanDeleteAnyService()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        
        $client = User::factory()->create(['role' => 'client']);
        $machine = Machine::factory()->create();
        $service = Service::factory()->create(['machine_id' => $machine->id])->toArray();

        $response = $this->actingAs($admin)
            ->delete( route('services.destroy', $service['id'] ) );
        
        $response->assertRedirect( route('services.index') );
        $this->assertDeleted('services', $service);

        $service_2 = Service::factory()->create()->toArray();
        $response = $this->actingAs($admin)
            ->delete( route('services.destroy', $service_2['id'] ) );
        
        $response->assertRedirect( route('services.index') );
        $this->assertDeleted('services', $service_2);
    }
}
