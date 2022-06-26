<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $touches = ["employees"];
    protected $fillable = [
        "name",
        "description",
        "price",
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function scheduling(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Service::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function employees()
    {
        return $this->belongsToMany(User::class,'employee_services', relatedPivotKey: 'employee_id');
    }
}
