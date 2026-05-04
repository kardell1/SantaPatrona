<?php

use Illuminate\Support\Facades\Route;
use Modules\Products\Http\Controllers\MenuCategoryController;
use Modules\Products\Http\Controllers\MenuProductController;

Route::prefix("v1")->group(function () {
    // se declara las rutas aca,
    // Route::get("products", function () {
    //     return response()->json([
    //         "status" => "ok",
    //         "message" => "modulo de presupuestos!",
    //     ]);
    // });
    Route::get("products", [MenuProductController::class, "index"]);

    Route::get("category-products", [MenuCategoryController::class, "index"]);
});

Route::middleware(["auth:sanctum"])
    ->prefix("v1")
    ->group(function () {
        // Route::apiResource('products', ProductsController::class)->names('products');
    });
