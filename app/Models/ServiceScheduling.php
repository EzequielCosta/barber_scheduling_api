<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceScheduling extends Model
{
    protected $table = "service_scheduling";

    use HasFactory;

    protected $fillable = [
        "scheduling_id",
        "service_id",
    ];
}
