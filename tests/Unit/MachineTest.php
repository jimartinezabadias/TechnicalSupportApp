<?php

namespace Tests\Unit;

use App\Models\Machine;
use PHPUnit\Framework\TestCase;
// use Illuminate\Foundation\Testing\RefreshDatabase;

class MachineTest extends TestCase
{
    
    // use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testMachineWithoutServices()
    {
        $machine = Machine::create([
            'owner' => 'nombre de owner', 
            'model' => 'modelo de la maquina', 
            'trademark' => 'marca de la maquina', 
            'type' => 'tipo de maquina']);

        // $services = $machine->services()->get();

        $owner = $machine->owner;

        // $this->assertEmpty($services);

        $this->assertTrue($owner == 'nombre de owner');
    }



}
