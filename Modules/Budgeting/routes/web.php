<?php

use Illuminate\Support\Facades\Route;
use Modules\Budgeting\Http\Controllers\BudgetingController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('budgetings', BudgetingController::class)->names('budgeting');
});
