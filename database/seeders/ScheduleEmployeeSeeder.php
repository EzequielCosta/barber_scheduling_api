<?php

namespace Database\Seeders;

use App\Models\ScheduleEmployee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scheduleEmployee = new ScheduleEmployee();
        $scheduleEmployee->users_id = 13;
        $scheduleEmployee->schedule_id = 4;
        $scheduleEmployee->save();

    }
}
