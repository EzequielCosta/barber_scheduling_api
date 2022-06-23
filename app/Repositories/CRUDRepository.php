<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CRUDRepository
{
    public function all(): array|Collection;
    public function store( array $data);
    public function show( string|int $id );
    public function update(array $data, string|int $id);
    public function destroy( string|int $id  );
}
