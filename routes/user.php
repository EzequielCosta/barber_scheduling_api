<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "user", "middleware" => ["auth:sanctum"]], function(){

    Route::get("/",[UserController::class, "index"]);
    Route::get("/",[UserController::class, "index"]);
    Route::get("/employees",[UserController::class, "allEmployees"]);
    Route::get("/employees/{id}/schedules",[UserController::class, "schedulesOfEmployees"]);
    Route::post("/employees/{id}/add-services",[UserController::class, "addServiceToEmployee"]);
    Route::post("/employees/{id}/add-schedule",[UserController::class, "addScheduleToEmployee"]);
    Route::post("/employees/{id}/schedule-available",[UserController::class, "employeeSchedulesAvailable"]);

    Route::get("/customers",[UserController::class, "allCustomers"]);

});
