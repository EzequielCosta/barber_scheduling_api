<?php

use App\Http\Controllers\SchedulingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
 *
 * Routers of Scheduling Model
 *
 */

Route::group(["prefix" => "scheduling", "middleware" => ["auth:sanctum"]], function(){

    Route::get("/", [SchedulingController::class, 'index']);
    Route::post("/", [SchedulingController::class, 'store']);
    Route::get("/{id}", [SchedulingController::class, 'show']);
    Route::put("/{id}", [SchedulingController::class, 'update']);
    Route::delete("/{id}", [SchedulingController::class, 'destroy']);
    Route::put("/cancel/{id}", [SchedulingController::class, 'cancel']);
    Route::get("/status/cancel", [SchedulingController::class, 'schedulingCancelAll']);
});

//});


