<?php

namespace App\Repositories;

use App\Models\Schedule;
use App\Models\Scheduling;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Utils;

class UserRepository
{
    private User $userModel;
    private Service $serviceModel;
    private Schedule $scheduleModel;
    private Scheduling $schedulingModel;

    public function __construct(User $user, Service $service, Schedule $schedule, Scheduling $schedulingModel)
    {
        $this->userModel = $user;
        $this->serviceModel = $service;
        $this->scheduleModel = $schedule;
        $this->schedulingModel = $schedulingModel;
    }

    public function all(): Collection
    {
        return $this->userModel::all();
    }

    public function allEmployees(): Collection
    {
        return $this->userModel->where("employee", "=", "1")->get();
    }

    public function allAdministrator(): Collection
    {
        return $this->userModel->where("administrator", "=", "1")->get();
    }

    public function allCustomers(): Collection
    {
        return $this->userModel->where("customer", "=", "1")->get();
    }

    public function schedulesOfEmployees(int $employeeId)
    {
        $userObject = $this->userModel->find($employeeId);
        if ($userObject === null) {
            return [];
        }

        return $userObject->schedules()->get();
    }

    public function employeeDaysAvailable(int $employeeId, string $date)
    {
        return $this->userModel->schedules();
    }

    public function addServiceToEmployee(array $serviceIds, int $employeeId)
    {
        $employeeModel = $this->userModel->find($employeeId);
        if ($employeeModel === null) {
            return [];
        }

        $serviceModels = [];
        foreach ($serviceIds as $serviceId) {
            $serviceModels[] = $this->serviceModel->find($serviceId);
        }

        $employeeModel->services()->saveMany($serviceModels);


        return $employeeModel->services;
    }

    public function addScheduleToEmployee(array $scheduleIds, int $employeeId)
    {
        $employeeModel = $this->userModel->find($employeeId);
        if ($employeeModel === null) {
            return [];
        }

        $scheduleModels = [];
        foreach ($scheduleIds as $scheduleId) {
            $scheduleModels[] = $this->scheduleModel->find($scheduleId);
        }

        $employeeModel->schedules()->saveMany($scheduleModels);

        return $employeeModel->schedules;
    }

    public function employeeSchedulesAvailable(int $employeeId, string $date)
    {

        $firstQuery = $this->scheduleModel
            ->select(["schedules.id","hour"])
            ->join("schedule_employee", "schedule_employee.schedule_id", "=", "schedules.id")
            ->get()
            ->toArray();
        $secondQuery = $this->schedulingModel
            ->select(["schedules.id",DB::raw('service_scheduling.time as hour')])
            ->join("service_scheduling", "schedulings.id", "=", "service_scheduling.scheduling_id")
            ->join("schedules", "service_scheduling.time", "=", "schedules.hour")
            ->where('employee_id', $employeeId)
            ->whereDate('date', $date)->get()->toArray();
        $diff = [];
        foreach ($firstQuery as $item) {
            if (!in_array($item, $secondQuery)) {
                $diff[] = $item;
            }
        }
        return $diff;
    }

}
