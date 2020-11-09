<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Machine;

class UserTest extends TestCase
{

    public function testUserIsAdmin()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $userIsAdmin = $user->isAdmin();
        $this->assertTrue($userIsAdmin);
    }
    
    public function testUserIsNotAdmin()
    {
        $user = User::factory()->create(['role' => 'client']);
        $userIsAdmin = $user->isAdmin();
        $this->assertFalse($userIsAdmin);
    }

    public function testUserCanHaveNoMachines()
    {
        $user = User::factory()->create();

        $machines = $user->machines()->get();

        $this->assertEmpty($machines);

    }

    public function testUserCanHaveManyMachines()
    {

        $user = User::factory()
            ->has(Machine::factory()->count(3))
            ->create(['role' => 'client']);

        $machines = $user->machines()->get();

        $this->assertNotEmpty($machines);

    }
}
