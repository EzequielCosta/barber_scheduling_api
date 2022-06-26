<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ScheduleEmployee extends Pivot
{
    use HasFactory;

    protected $table = "schedule_employee";

    protected $fillable = [
        "employee_id",
        "schedule_id",
    ];
}
