<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\User;

class ServiceSeeder extends Seeder
{

    public function run()
    {
        $service_1 = Service::factory()->create();
        $service_2 = Service::factory()->create();
        
        $client_1 = User::where('name','Cliente')->first(); 
        $client_2 = User::where('name','Dos')->first(); 
        
        $machine_1 = $service_1->machine;
        $machine_2 = $service_2->machine;

        $machine_1->user()->associate($client_1)->save();
        $machine_2->user()->associate($client_2)->save();
    }
}
