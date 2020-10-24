<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PrivateUrlsTest extends TestCase
{
   
    private $loginUrl = "/login";
    
    /**
     * Non logged in must redirect.
     *
     * @return void
     */
    public function testMachineNotLoggedIn()
    {
        $response = $this->get('/machines');

        $response->assertRedirect($this->loginUrl);
    }

    /**
     * Non logged in must redirect.
     *
     * @return void
     */
    public function testServiceNotLoggedIn()
    {
        $response = $this->get('/services');

        $response->assertRedirect($this->loginUrl);
    }

    /**
     *  Logged in must show Machines view.
     *
     * @return void
     */
    public function testMachineLoggedIn()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
                         ->get('/machines');

        $response->assertSee('My Machines');
    }

    /**
     *  Logged in must show Machines view.
     *
     * @return void
     */
    public function testServiceLoggedIn()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
                         ->get('/services');

        $response->assertSee('All Services');
    }
    
}
