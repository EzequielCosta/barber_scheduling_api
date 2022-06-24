<?php

namespace App\Repositories;

use App\Models\Scheduling;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class SchedulingRepository implements CRUDRepository
{
    private Scheduling $scheduling;

    /**
     * @param Scheduling $scheduling
     */
    public function __construct(Scheduling $scheduling)
    {
        $this->scheduling = $scheduling;
    }


    /**
     * @return array|Collection
     */
    public function all(): array|Collection
    {
        return $this->scheduling::all();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->scheduling::create($data);
    }

    /**
     * @param string|int $id
     * @return mixed
     */
    public function show(int|string $id)
    {
        return $this->scheduling::find($id);
    }

    /**
     * @param array $data
     * @param string|int $id
     * @return mixed
     */
    public function update(array $data, int|string $id)
    {
        $object = $this->scheduling->find($id);
        if ($object === null){
            return [];
        }
        $object->update($data);
        return $object;
    }

    /**
     * @param string|int $id
     * @return mixed
     */
    public function destroy(int|string $id)
    {
        return $this->scheduling->destroy($id);
    }

    /**
     * @param Schedule $schedule
     * @param User $employee
     * @param $date
     * @return bool
     */
    public function checkIfScheduleToBeAvailableForEmployee ( Schedule $schedule, User $employee, $date) : bool{
        $alreadyWasScheduled = Scheduling::where([
            ["employee_id", "=", $employee->id],
            ["time", "=", $schedule->id],
            ["date", "=", $date],
        ])->count();

        return !($alreadyWasScheduled === 0);

    }
}
