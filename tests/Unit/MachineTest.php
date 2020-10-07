<?php

namespace Tests\Unit;

use App\Models\Machine;
use App\Models\Service;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class MachineTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testMachineWithoutServices()
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

}
