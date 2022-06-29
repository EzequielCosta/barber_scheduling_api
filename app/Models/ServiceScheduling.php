<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ServiceScheduling extends Pivot
{
    protected $table = "service_scheduling";

    use HasFactory;

    protected $fillable = [
        "scheduling_id",
        "service_id",
        "time",
    ];

    public function service(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
