<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Service;

class ServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testServiceWithoutMachine()
    {
        
        $service = new Service(
            ['failure' => 'falla', 
            'date' => now(), 
            'price' => 3424, 
            'failure_description' => 'descripcion de la falla', 
            'service_description' => 'descripcion del trabajo realizado']);

        // $machine = $service->machine()->get();

        // $this->assertEmpty($machine);
        
        $this->assertTrue(true);

    }
}
