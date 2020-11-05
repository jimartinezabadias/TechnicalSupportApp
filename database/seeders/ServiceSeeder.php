<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\User;

class ServiceSeeder extends Seeder
{

    public function run()
    {
        $service = Service::factory()->create();
        
        $client = User::where('name','Cliente')->first(); 

        $machine = $service->machine;

        $machine->user()->associate($client)->save();
    }
}
