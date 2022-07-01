<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Scheduling extends Model
{
    use HasFactory;


    protected  $fillable = [
        'time',
        'date',
        'employee_id',
        'customer_id',
        'total_price',
        'status',
        'motivo'
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function services(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            Service::class,
            'service_scheduling',
        )->using(ServiceScheduling::class)->withTimestamps();
    }
}
