<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Utils;

class UserRepository
{
    private User $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
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

    public function allCustumers(): Collection
    {
        return $this->userModel->where("custumer", "=", "1")->get();
    }

    public function schedulesOfEmployees(int $employeeId)
    {
        $userObject = $this->userModel->find($employeeId);
        if ($userObject === null){
            return [];
        }

        return $userObject->schedules()->get();
    }


}
