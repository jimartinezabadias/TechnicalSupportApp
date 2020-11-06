<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Machine;
use App\Models\Service;
use App\Models\User;

class MachineSeeder extends Seeder
{
    
    public function run()
    {
        // Machine::factory(4)->create();
        Machine::factory()
            ->create();

        
        $client = User::where('name','Cliente')->first(); 
        
        Machine::first()->user()->associate($client)->save();
    }

}
