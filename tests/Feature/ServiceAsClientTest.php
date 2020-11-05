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

    // public function testClientCanViewTheirServices()
    // {
    //     $client = User::factory()->create(['role' => 'client']);
        
    //     $response = $this->actingAs($client)
    //                     ->get( route('services.index') );

    //     $response->assertSuccessful();
    //     $response->assertSee('My Services');
    // }

}
