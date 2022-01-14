<?php

use App\Http\Controllers\IrrigationTypeController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\LandTypeController;
use App\Http\Controllers\OfferTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/lands", [LandController::class, "list"]);

Route::get("/lands/{id}", [LandController::class, "view"]);

Route::post("/lands", [LandController::class, "create"]);

Route::put("/lands/{id}", [LandController::class, "edit"]);

Route::delete("/lands/{id}", [LandController::class, "destroy"]);
