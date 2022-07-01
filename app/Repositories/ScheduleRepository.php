<?php

namespace App\Repositories;

use App\Models\Schedule;

class ScheduleRepository
{

    public function allSchedules(): \Illuminate\Database\Eloquent\Collection
    {
        return Schedule::all();
    }
}
