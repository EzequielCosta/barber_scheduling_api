<?php

namespace App\Services;

use App\Repositories\ServiceRepository;
use Illuminate\Database\Eloquent\Collection;

class ServicesService implements CRUDService
{
    private ServiceRepository $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository){
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * @return array|Collection
     */
    public function all(): array|Collection
    {
        return $this->serviceRepository->all();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->serviceRepository->store($data);
    }

    /**
     * @param string|int $id
     * @return mixed
     */
    public function show(int|string $id): mixed
    {
        return $this->serviceRepository->show($id);
    }

    /**
     * @param array $data
     * @param string|int $id
     * @return mixed
     */
    public function update(array $data, int|string $id)
    {
        return $this->serviceRepository->update($data, $id);
    }

    /**
     * @param string|int $id
     * @return mixed
     */
    public function destroy(int|string $id)
    {
        return $this->serviceRepository->destroy($id);
    }

    public function findEmployeesByService( int $id ){
        return $this->serviceRepository->findEmployeesByService($id);
    }
}
