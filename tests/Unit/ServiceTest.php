<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Service;
use App\Models\Machine;

class ServiceTest extends TestCase
{
    
    public function testServiceCanHaveNoMachine()
    {
        
        $service = Service::factory()->create();

        $machine = $service->machine()->get();

        $this->assertEmpty($machine);

    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testServiceWithMachine()
    {
        
        $service = Service::factory()->create();

        $machine = Machine::factory()->create();
        
        $service->machine()->associate($machine);

        $machine = $service->machine()->get();

        $this->assertNotEmpty($machine);

    }
}
