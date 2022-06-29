<?php

namespace App\Services;

use App\Repositories\UserRepository;
use http\Env\Request;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    private UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;

    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {

        return $this->userRepository->all();
    }

    /**
     * @return Collection
     */
    public function allEmployees(): Collection
    {
        return $this->userRepository->allEmployees();
    }

    /**
     * @return Collection
     */
    public function allAdministrator(): Collection
    {
        return $this->userRepository->allAdministrator();
    }

    /**
     * @return Collection
     */
    public function allCustomers(): Collection
    {
        return $this->userRepository->allCustomers();
    }

    public function schedulesOfEmployees(int $employeeId)
    {
        return $this->userRepository->schedulesOfEmployees($employeeId);
    }

    public function employeeDaysAvailable(int $employeeId, string $date)
    {
        return $this->userRepository->employeeDaysAvailable();
    }

    public function addServiceToEmployee(array $serviceIds, int $employeeId){
        return $this->userRepository->addServiceToEmployee($serviceIds, $employeeId);

    }

    public function addScheduleToEmployee(array $scheduleIds, int $employeeId){
        return $this->userRepository->addScheduleToEmployee($scheduleIds, $employeeId);

    }

    public function employeeSchedulesAvailable(int $employeeId, string $date){
        return $this->userRepository->employeeSchedulesAvailable($employeeId, $date);
    }

    public function serviceOfEmployee(int $employeeId)
    {
        return $this->userRepository->serviceOfEmployee($employeeId);
    }

    public function findCustomer($customerId){

        return $this->userRepository->findCustomer($customerId);
    }

    /**
     * @param Request $request
     * @param $userId
     * @return string
     */

    public function update(array $data, $userId): string
    {
        $object = $this->userRepository->udpate($data,$userId);

        if ($object === null){
            return "User not found";
        }

        return $object;
    }
}
