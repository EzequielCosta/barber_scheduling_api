<?php

namespace App\Services;

use App\Repositories\ScheduleRepository;
use Illuminate\Database\Eloquent\Collection;

class ScheduleService
{
    private ScheduleRepository $scheduleRepository;

    public function __construct( ScheduleRepository $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    /**
     * @return Collection
     */

    public function allSchedules(): Collection
    {
        return $this->scheduleRepository->allSchedules();
    }

    /**
     * @param $data
     * @return mixed|string[]
     */
    public function store($data)
    {
        $schedule = $this->scheduleRepository->searchByHour($data["hour"]);

        if ($schedule !== null)
            return ["error" => "Hour already exist"];

        return $this->scheduleRepository->store($data);
    }

    /**
     * @param int $id
     * @return int
     */
    public function destroy(int $id): int
    {

        return $this->scheduleRepository->destroy($id);
    }
}
