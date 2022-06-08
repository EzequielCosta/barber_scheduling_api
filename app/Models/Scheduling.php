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
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
