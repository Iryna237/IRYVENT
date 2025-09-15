<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::factory()->create([
            'name' => 'Iryvent Support',
            'email' => 'contact@iryvent.com',
            'password' => Hash::make('IryventSupporrt'),
            'role' => 'admin',
        ]);
    }
}
