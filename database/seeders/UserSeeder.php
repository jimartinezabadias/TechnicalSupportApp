<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Cliente',
            'email' => 'cliente@cliente.com',
            'password' => bcrypt('1234'),
            'role' => 'client'
        ]);
        
        User::create([
            'name' => 'Dos',
            'email' => 'cliente2@cliente.com',
            'password' => bcrypt('1234'),
            'role' => 'client'
        ]);

    }
}
