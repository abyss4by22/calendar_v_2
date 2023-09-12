<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([ //infos is the name of the table
            'title' => "event1", 
            'start_date' => date('2023-9-20 09:00:00'), // Format: 'YYYY-MM-DD HH:MM:SS'
            'end_date' => date('2023-9-20 12:00:00')
        ]);
    }
}
