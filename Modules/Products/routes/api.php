<?php

use Illuminate\Support\Facades\Route;
use Modules\Products\Http\Controllers\ComboController;
use Modules\Products\Http\Controllers\MenuCategoryController;
use Modules\Products\Http\Controllers\MenuInventoryController;
use Modules\Products\Http\Controllers\MenuProductController;

Route::prefix("v1")->group(function () {
    Route::post('combos', [ComboController::class, 'store']);
    // se declara las rutas aca,
    Route::get('combos', [ComboController::class, 'index']);

    Route::get('combos/{combos}', [ComboController::class, 'show']);

    Route::put('combos/{combos}', [ComboController::class, 'update']);

    // =================================== productos =================================
    Route::get("products", [MenuProductController::class, "index"]);
    //
    Route::post("products", [MenuProductController::class, "store"]);
    //
    Route::get("products/{menuProduct}", [
        MenuProductController::class,
        "show",
    ]);
    Route::patch("products/{menuProduct}", [
        MenuProductController::class,
        "update",
    ]);
    Route::delete("products/{menuProduct}", [
        MenuProductController::class,
        "destroy",
    ]);

    // de categorias
    Route::get("category-products", [MenuCategoryController::class, "index"]);
    Route::post("category-products", [MenuCategoryController::class, "store"]);
    Route::get("category-products/{menuCategory}", [
        MenuCategoryController::class,
        "show",
    ]);
    Route::patch("category-products/{menuCategory}", [
        MenuCategoryController::class,
        "update",
    ]);
    Route::delete("category-products/{menuCategory}", [
        MenuCategoryController::class,
        "destroy",
    ]);
    // ========================== inventarios ====================================
    Route::get("inventory", [MenuInventoryController::class, "index"]);
    Route::post("inventory", [MenuInventoryController::class, "store"]);
    Route::get("inventory/{menuInventory}", [MenuInventoryController::class, "update"]);
    Route::delete("inventory", [MenuInventoryController::class, "destroy"]);
});

Route::middleware(["auth:sanctum"])
    ->prefix("v1")
    ->group(function () {
        // Route::apiResource('products', ProductsController::class)->names('products');
    });
