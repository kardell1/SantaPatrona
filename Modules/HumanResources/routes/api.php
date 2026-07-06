<?php

use App\Http\Controllers\BranchController;
use Illuminate\Support\Facades\Route;
use Modules\HumanResources\Http\Controllers\EmployeeConfigurationController;
use Modules\HumanResources\Http\Controllers\EmployeeTypeController;
use Modules\HumanResources\Http\Controllers\HumanResourcesController;
use Modules\HumanResources\Http\Controllers\PositionController;
use Modules\IAM\Http\Controllers\EmployeeController;
use Modules\IAM\Http\Controllers\PermissionController;
use Modules\IAM\Http\Controllers\RoleController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('humanresources', HumanResourcesController::class)->names('humanresources');
});

Route::prefix('v1/core')->group(function () {

    // =====================================================================================
    // =============================== Empleados internos ==================================
    // =====================================================================================

    // EMpleados internos, donde definimos sueldos , area de trabajo , sucursales donde pueden acceder
    Route::get('employees', [EmployeeController::class, 'index']);
    Route::get('employees/{employee}', [EmployeeController::class, 'show']);
    Route::patch('employees/{employee}', [EmployeeController::class, 'update']);

    // =====================================================================================
    // ============================= Configuracion Roles ===================================
    // =====================================================================================

    Route::get('configuration/roles', [RoleController::class, 'index']);
    Route::post('configuration/roles', [RoleController::class, 'store']);
    Route::put('configuration/roles/{role}', [RoleController::class, 'update']);
    Route::delete('configuration/roles/{role}', [RoleController::class, 'destroy']);

    // =====================================================================================
    // ============================= Configuracion permisos ===================================
    // =====================================================================================

    Route::get('configuration/permissions', [PermissionController::class, 'index']);
    // permitir solo actualizar descripciones
    //Route::put('configuration/permissions/{permission}', [PermissionController::class, 'update']);

    // =====================================================================================
    // ========================= Configuracion empleados ===================================
    // =====================================================================================
    // creacion de empleados unicamente para el super admin
    Route::get('configuration/employees', [EmployeeConfigurationController::class, 'index']);
    Route::post('configuration/employees', [EmployeeConfigurationController::class, 'store']);
    Route::get('configuration/employees/{id}', [EmployeeConfigurationController::class, 'show']);
    Route::get('configuration/information/employees/{id}', [EmployeeConfigurationController::class, 'info']);
    Route::put('configuration/employees/{employee}', [EmployeeConfigurationController::class, 'update']);
    Route::delete('configuration/employees/{employee}', [EmployeeConfigurationController::class, 'destroy']);
    //
    // =====================================================================================
    // ========================= Configuracion Cargos ======================================
    // =====================================================================================

    // manda unicamente nombre y id ,  es para el form de creacion
    Route::get('configuration/positions', [PositionController::class, 'index']);
    // para la ruta de configuracion podemos mandar mas datos , y otro metodo
    Route::post('configuration/positions', [PositionController::class, 'store']);
    Route::put('configuration/positions/{position}', [PositionController::class, 'update']);
    Route::delete('configuration/positions/{position}', [PositionController::class, 'destroy']);

    // =====================================================================================
    // ========================= Configuracion Sucursales ==================================
    // =====================================================================================

    Route::get('configuration/branches', [BranchController::class, 'index']);
    Route::post('configuration/branches', [BranchController::class, 'store']);
    Route::put('configuration/branches/{branch}', [BranchController::class, 'update']);
    Route::delete('configuration/branches/{branch}', [BranchController::class, 'destroy']);

    // =====================================================================================
    // ========================= Configuracion Roles =======================================
    // =====================================================================================

    Route::get('configuration/roles', [RoleController::class, 'index']);
    Route::post('configuration/roles', [RoleController::class, 'store']);
    Route::patch('configuration/roles/{role}', [RoleController::class, 'update']);
    //Route::delete('configuration/roles/{role}', [RoleController::class, 'destroy']);
    Route::get('configuration/roles/{id}', [RoleController::class, 'show']);
    // =====================================================================================
    // ========================= Configuracion Tipos de empleados ==========================
    // =====================================================================================

    Route::get('configuration/employee-types', [EmployeeTypeController::class, 'index']);
    Route::post('configuration/employee-types', [EmployeeTypeController::class, 'store']);
    Route::put('configuration/employee-types/{employeeType}', [EmployeeTypeController::class, 'update']);
    Route::delete('configuration/employee-types/{employeeType}', [EmployeeTypeController::class, 'destroy']);



});
