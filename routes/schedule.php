<?php

use App\Http\Controllers\ScheduleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
 *
 * Routers of Schedule Model
 *
 */

Route::group(["prefix" => "schedule", "middleware" => ["auth:sanctum"]], function(){

    Route::get("/", [ScheduleController::class, 'index']);
    Route::post("/", [ScheduleController::class, 'store']);
    Route::delete("/{id}", [ScheduleController::class, 'destroy']);

});

//});


