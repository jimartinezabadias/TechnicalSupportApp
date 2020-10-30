<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PrivateUrlsTest extends TestCase
{
   
    private $loginUrl = "/login";
    
    public function testAccessMachineRedirectWhenNotLoggedIn()
    {
        $response = $this->get( route('machines.index') );

        $response->assertRedirect($this->loginUrl);
    }

    public function testAccessServiceRedirectWhenNotLoggedIn()
    {
        $response = $this->get( route('services.index') );

        $response->assertRedirect($this->loginUrl);
    }

    public function testAccessServices()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
                         ->get( route('services.index') );

        $response->assertSee('All Services');
    }
    
}
