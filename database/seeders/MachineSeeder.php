<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Machine;
use App\Models\Service;

class MachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Machine::factory(4)->create();
        Machine::factory()
            ->has(Service::factory()->count(3))
            ->create();
    }
}
