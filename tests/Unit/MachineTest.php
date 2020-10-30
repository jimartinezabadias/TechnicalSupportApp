<?php

namespace Tests\Unit;

use App\Models\Machine;
use App\Models\Service;
use App\Models\User;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class MachineTest extends TestCase
{

    public function testMachineCanHaveNoServices()
    {

        $machine = Machine::factory()->create();

        $services = $machine->services()->get();

        $this->assertEmpty($services);

    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testMachineWithServices()
    {

        $machine = Machine::factory()
                            ->has(Service::factory()->count(3))
                            ->create();

        $services = $machine->services()->get();

        $this->assertNotEmpty($services);

    }

    public function testMachineCanHaveNoUser()
    {

        $machine = Machine::factory()->create();

        $user = $machine->user;

        $this->assertNull($user);

    }
    
    public function testMachineCanHaveUser()
    {

        $machine = Machine::factory()->create();
        $user = User::factory()->create();

        $machine->user()->associate($user);

        $this->assertEquals($user->id,$machine->user->id);

    }




}
