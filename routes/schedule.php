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
//    Route::get("/{id}", [SchedulingController::class, 'show']);
//    Route::put("/{id}", [SchedulingController::class, 'update']);
//    Route::delete("/{id}", [SchedulingController::class, 'destroy']);
//    Route::put("/cancel/{id}", [SchedulingController::class, 'cancel']);
//    Route::get("/status/cancel", [SchedulingController::class, 'schedulingCancelAll']);
});

//});


