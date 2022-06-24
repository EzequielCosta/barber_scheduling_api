<?php

namespace App\Services;

use App\Repositories\SchedulingRepository;
use Illuminate\Database\Eloquent\Collection;

class SchedulingService implements CRUDService
{
    private SchedulingRepository $schedulingRepository;

    public function __construct(SchedulingRepository $schedulingRepository)
    {
        $this->schedulingRepository = $schedulingRepository;
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

        return $this->schedulingRepository->store();
    }

    /**
     * @param string|int $id
     * @return mixed
     */
    public function show(int|string $id)
    {
        return $this->schedulingRepository->store($id);
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
        return $this->schedulingRepository->destroy($id);
    }
}
