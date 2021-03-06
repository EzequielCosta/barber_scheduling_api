<?php

namespace App\Repositories;

use App\Models\Scheduling;
use App\Models\Service;
use App\Models\ServiceScheduling;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

const SCHEDULING_PENDING = "1";
const SCHEDULING_CANCEL = "2";

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
        $schedulingObject = $this->scheduling::create($data);
//        $services= $data["services"];
//        $totalPrice = 0.0;
//        foreach ($services as $service){
//            $serviceObject = Service::find($service["id"]);
//            $totalPrice += $serviceObject->price;
//            ServiceScheduling::create([
//                "scheduling_id" => $schedulingObject->id,
//                "service_id" => $service["id"],
//                "time" => $service["time"],
//            ]);
//        }
//        $schedulingObject->total_price = $totalPrice;
//        $schedulingObject->save();

        return $schedulingObject;
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

    /**
     * @param array $data
     * @param Scheduling $scheduling
     * @return bool
     */

    public function cancelScheduling (array $data, Scheduling $scheduling): bool
    {

        $data = [
          "cause_canceling" => $data["cause_canceling"],
          "status" => SCHEDULING_CANCEL,
        ];

        return $scheduling->update($data);

    }

    public function schedulingsCancel(){

        return $this->scheduling->where("status", SCHEDULING_CANCEL)->get();
    }

}
