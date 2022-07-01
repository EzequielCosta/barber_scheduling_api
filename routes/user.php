<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "user", "middleware" => ["auth:sanctum"]], function(){

    Route::get("/",[UserController::class, "index"]);
    Route::put("/{id}",[UserController::class, "update"]);
    Route::get("/employees",[UserController::class, "allEmployees"]);
    Route::get("/employees/{id}/schedules",[UserController::class, "schedulesOfEmployees"]);
    Route::get("/employees/{id}/scheduling",[UserController::class, "schedulingsOfEmployees"]);
    Route::post("/employees/{id}/add-services",[UserController::class, "addServiceToEmployee"]);
    Route::post("/employees/{id}/add-schedule",[UserController::class, "addScheduleToEmployee"]);
    Route::post("/employees/{id}/schedule-available",[UserController::class, "employeeSchedulesAvailable"]);
    Route::get("/employees/{id}/services",[UserController::class, "serviceOfEmployee"]);

    Route::get("/customers",[UserController::class, "allCustomers"]);
    Route::get("/customers/{id}",[UserController::class, "showCustomer"]);

});
