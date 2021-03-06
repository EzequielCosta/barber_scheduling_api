<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Database\Factories\ScheduleFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::factory()->count(10)->create();
    }
}
