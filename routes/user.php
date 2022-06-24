<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "user", "middleware" => ["auth:sanctum"]], function(){

    Route::get("/",[UserController::class, "index"]);
    Route::get("/employees",[UserController::class, "allEmployees"]);
    Route::get("/employees/{id}/schedules",[UserController::class, "schedulesOfEmployees"]);
    Route::get("/",[UserController::class, "index"]);

});
