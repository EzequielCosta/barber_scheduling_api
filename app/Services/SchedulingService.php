<?php

namespace App\Services;

use App\Repositories\SchedulingRepository;
use App\Repositories\ServiceSchedulingRepository;
use Illuminate\Database\Eloquent\Collection;

class SchedulingService implements CRUDService
{
    private SchedulingRepository $schedulingRepository;
    private ServiceSchedulingRepository $serviceSchedulingRepository;

    public function __construct(SchedulingRepository $schedulingRepository, ServiceSchedulingRepository $serviceSchedulingRepository)
    {
        $this->schedulingRepository = $schedulingRepository;
        $this->serviceSchedulingRepository = $serviceSchedulingRepository;
    }

    /**
     * @return array|Collection
     */
    public function all(): array|Collection
    {
        return $this->schedulingRepository->all();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {

//        if ($this->schedulingRepository->checkIfScheduleToBeAvailableForEmployee()){
//            return ["error" => "Already schedule to this date"];
//        }
//        $this->schedulingRepository->store($data);
//        $schedulingId = $data["id"];
//        $this->serviceSchedulingRepository->store($schedulingId, $data["services"]);

        $schedulingObject = $this->schedulingRepository->store($data);
        $totalPrice = 0.0;
        foreach ($data["services"] as $service){
            $dataService = $service;
            $dataService["scheduling_id"] = $schedulingObject->id;
            $dataService["service_id"] = $service["id"];
            $serviceSchedulingObject = $this->serviceSchedulingRepository->store($dataService);
            $totalPrice += $serviceSchedulingObject->service->price;
        }

        return $this->schedulingRepository->update(["total_price" => $totalPrice], $schedulingObject->id);

    }

    /**
     * @param string|int $id
     * @return mixed
     */
    public function show(int|string $id)
    {
        return $this->schedulingRepository->show($id);
    }

    /**
     * @param array $data
     * @param string|int $id
     * @return mixed
     */
    public function update(array $data, int|string $id)
    {
        return $this->schedulingRepository->update($data, $id);
    }

    /**
     * @param string|int $id
     * @return mixed
     */
    public function destroy(int|string $id)
    {

    }
}
