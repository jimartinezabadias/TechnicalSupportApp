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

        $client = User::factory()->create(['role' => 'client']);
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
        $machine = Machine::factory()->create();

        $response = $this->actingAs($admin)
                        ->post( route('services.store'), [
                            'machine_id' => $machine->id,
                            'failure' => 'this is the test service',
                            'date' => date('m/d/Y h:i:s a', time()),
                            'price' => '1232134',
                            'failure_description' => 'ssfasf',
                            'service_description' => 'sdfsfsf'
                        ]);
        
        $response->assertRedirect();
        
        // no funcionana otros asserts porque se ve una vista intermedia
        // igual que en el test de maquina 
        // $response->assertSee('this is the test service');

    }


}
