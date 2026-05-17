<?php

use Illuminate\Support\Facades\Route;
use Modules\Sales\Http\Controllers\SaleController;


Route::prefix("v1")->group(function () {
    Route::post("sales", [
        SaleController::class,
        "store",
    ]);

    Route::get('sales' , [SaleController::class , 'index']);
});






Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    //Route::apiResource('sales', SaleController::class)->names('sales');
});
