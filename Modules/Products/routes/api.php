<?php

use Illuminate\Support\Facades\Route;
use Modules\Products\Http\Controllers\CategoryController;
use Modules\Products\Http\Controllers\ProductsController;




Route::prefix('v1')->group(function () {

    // =====================================================================================
    // =============================== Productos ===========================================
    // =====================================================================================

    Route::get('products', [ProductsController::class, 'index']);
    Route::get('products/{product}', [ProductsController::class, 'show']);
    Route::patch('products/{product}', [ProductsController::class, 'update']);

    // =====================================================================================
    // =============================== Categories ===========================================
    // =====================================================================================

    // todos lo ven
    Route::get('categories' , [CategoryController::class , 'index']);
    // solo lo crea el admin
    Route::post('categories' , [CategoryController::class , 'store']);
    // visualizacion general
    Route::get('categories/{id}' , [CategoryController::class , 'show']);
    // actualizacion para el admin
    Route::patch('categories/{id}' , [CategoryController::class , 'update']);

    Route::delete('categories/{id}' , [CategoryController::class , 'destroy']);

    // =====================================================================================
    // =============================== Colores ===========================================
    // =====================================================================================

    // =====================================================================================
    // =============================== Tallas ===========================================
    // =====================================================================================

    // =====================================================================================
    // =============================== Tags ===========================================
    // =====================================================================================


});




Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('products', ProductsController::class)->names('products');
});
