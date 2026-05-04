<?php

use Illuminate\Support\Facades\Route;
use Modules\Budgeting\Http\Controllers\BudgetingController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('budgetings', BudgetingController::class)->names('budgeting');
});
