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

    // public function testAdminCanViewAllServices()
    // {
    //     $admin = User::factory()->create(['role' => 'admin']);
        
    //     $response = $this->actingAs($admin)
    //                     ->get( route('services.index') );

    //     $response->assertSuccessful();
    //     $response->assertSee('All Services');
    // }

}
