<?php

namespace App\Repositories;

use App\Models\Schedule;
use Illuminate\Database\Eloquent\Collection;

class ScheduleRepository
{

    public function allSchedules(): Collection
    {
        return Schedule::all();
    }

    /**
     * @param $data
     * @return mixed
     */

    public function store($data): mixed
    {
        return Schedule::create($data);
    }

    /**
     * @param int $id
     * @return mixed
     */

    public function show( int $id): mixed
    {
        return Schedule::find($id);
    }

    /**
     * @param string $hour
     * @return mixed
     */
    public function searchByHour(string $hour): mixed
    {
        return Schedule::where("hour", $hour)->first();
    }

    /**
     * @param int $id
     * @return int
     */
    public function destroy(int $id): int
    {
        return Schedule::destroy($id);
    }

}
