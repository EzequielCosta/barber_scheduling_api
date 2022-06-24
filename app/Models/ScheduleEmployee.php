<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleEmployee extends Model
{
    use HasFactory;

    protected $table = "schedule_employee";

    protected $fillable = [
        "employee_id",
        "schedule_id",
    ];
}
