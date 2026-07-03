<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {


});


Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {});
