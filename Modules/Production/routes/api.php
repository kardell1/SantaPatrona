<?php

use Illuminate\Support\Facades\Route;
use Modules\Production\Http\Controllers\ProductionController;
use Modules\Production\Http\Controllers\RawProductController;

Route::prefix("v1")->group(function () {
    // se declara las rutas aca,
    Route::get("production", function () {
        return response()->json([
            "status" => "ok",
            "message" => "modulo de presupuestos!",
        ]);
    });
    Route::get("production", [RawProductController::class, "index"]);
});

// esta dentro porque usa sanctum , dejar las rutas afuera por ahora
Route::middleware(["auth:sanctum"])
    ->prefix("v1")
    ->group(function () {
        Route::apiResource("productions", ProductionController::class)->names(
            "production",
        );
    });
