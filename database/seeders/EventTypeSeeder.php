<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        DB::table('event_types')->insert([
            ['name' => 'Conférence'],
            ['name' => 'Match de foot'],
            ['name' => 'Concert'],
            ['name' => 'Séminaire'],
            
        ]);
    }
}
