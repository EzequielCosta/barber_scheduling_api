<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

interface CRUDService
{
    public function all(): array|Collection;
    public function store( array $data);
    public function show( string|int $id );
    public function update(array $data, string|int $id);
    public function destroy( string|int $id  );
}
