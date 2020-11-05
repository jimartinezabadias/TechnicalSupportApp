<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Service;
use App\Models\Machine;

class ServiceTest extends TestCase
{

    public function testServiceHasAMachine()
    {
        
        $service = Service::factory()->create();

        $machine = $service->machine()->get();

        $this->assertNotEmpty($machine);

    }
    
}
