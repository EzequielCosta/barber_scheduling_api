<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Models\ServiceScheduling;

class ServiceSchedulingRepository
{

    private ServiceScheduling $serviceSchedulingModel;

    public function __construct(ServiceScheduling $serviceSchedulingModel)
    {
        $this->serviceSchedulingModel = $serviceSchedulingModel;
    }

    /**
     * @return array|Collection
     */
    public function all(): array|Collection
    {
        return $this->serviceSchedulingModel::all();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store( array $data)
    {
        return $this->serviceSchedulingModel->create($data);
    }

    /**
     * @param string|int $id
     * @return mixed
     */
    public function show(int|string $id)
    {
        return $this->serviceSchedulingModel->find($id);
    }

    /**
     * @param array $data
     * @param string|int $id
     * @return mixed
     */
    public function update(array $data, int|string $id)
    {
        return $this->serviceSchedulingModel::find($id)->update($data);
    }

    /**
     * @param string|int $id
     * @return mixed
     */
    public function destroy(int|string $id)
    {
        // TODO: Implement destroy() method.
    }
}
