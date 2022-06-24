<?php

use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;


Route::group(["prefix" => "service", "middleware" => ["auth:sanctum"]], function(){
    Route::get("/",[ServiceController::class, "index"]);
    Route::post("/",[ServiceController::class, "store"]);
    Route::get("/{id}",[ServiceController::class, "show"]);
    Route::put("/{id}",[ServiceController::class, "update"]);
    Route::delete("/{id}",[ServiceController::class, "destroy"]);
    Route::get("/{id}/employees",[ServiceController::class, "findEmployeesByService"]);

});
