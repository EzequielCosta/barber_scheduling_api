<?php

namespace App\Http\Services;

use App\Repositories\UserRepository;
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
    public function allCustumer(): Collection
    {
        return $this->userRepository->allCustumers();
    }

    public function schedulesOfEmployees(int $employeeId)
    {
        return $this->userRepository->schedulesOfEmployees($employeeId);
    }
}
