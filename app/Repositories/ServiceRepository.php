<?php

namespace App\Repositories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;

class ServiceRepository implements CRUDRepository
{
    /**
     * @var Service
     */
    private Service $service;

    /**
     * @param Service $service
     */
    public function __construct( Service $service ){
        $this->service = $service;
    }

    /**
     * @return array|Collection
     */
    public function all(): array|Collection
    {
        return $this->service::all();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->service::create($data);
    }

    /**
     * @param string|int $id
     * @return mixed
     */
    public function show(int|string $id)
    {
        return $this->service::find($id);
    }


    /**
     * @param array $data
     * @param string|int $id
     * @return mixed
     */
    public function update(array $data, int|string $id)
    {
        $object = $this->service->find($id);
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
        return $this->service::destroy($id);
    }
}
