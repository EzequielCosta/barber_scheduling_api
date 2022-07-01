<?php

namespace App\Services;

use App\Repositories\ScheduleRepository;

class ScheduleService
{
    private ScheduleRepository $scheduleRepository;

    public function __construct( ScheduleRepository $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    public function allSchedules(){
        return $this->scheduleRepository->allSchedules();
    }
}
