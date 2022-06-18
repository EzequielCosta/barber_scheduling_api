<?php

use App\Http\Controllers\SchedulingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
 *
 * Routers of Scheduling Model
 *
 */

//Route::prefix("scheduling")->group(function (){
//    require __DIR__.'/scheduling.php';
//});

//Route::middleware("auth")->group( function (){
//Route::prefix("scheduling")->group(function(){
Route::group(["prefix" => "scheduling", "middleware" => ["auth:sanctum"]], function(){

    Route::get("/", [SchedulingController::class, 'index']);
    Route::post("/", [SchedulingController::class, 'store']);
    Route::get("/scheduling/{id}", [SchedulingController::class, 'show']);
    Route::put("/scheduling/{id}", [SchedulingController::class, 'update']);
    Route::delete("/scheduling/{id}", [SchedulingController::class, 'destroy']);
});
//    Route::get("/index", [SchedulingController::class, 'index'])->middleware("auth:sanctum");
//});

//});


