<?php

namespace Tests\Feature;

use App\Models\Machine;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class MachineApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetMachinesApi()
    {
        $user = User::factory()->create();

        $machine = Machine::factory()->create(
            [
                "assigned_to" => $user->id
            ]
        );

        Sanctum::actingAs(
            $User,
            ['view machines']
        );

        $response = $this->getJson('/api/machines');

        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonFragment([
            "assigned_to" => $user->id
        ]);
    }
}
