<?php

use Illuminate\Support\Facades\Route;
use Modules\HumanResources\Http\Controllers\BrandController;
use Modules\Products\Http\Controllers\CategoryController;
use Modules\Products\Http\Controllers\ColorController;
use Modules\Products\Http\Controllers\MaterialController;
use Modules\Products\Http\Controllers\MeasurementUnitController;
use Modules\Products\Http\Controllers\ProductsController;
use Modules\Products\Http\Controllers\ProductVariantController;
use Modules\Products\Http\Controllers\SizeController;
use Modules\Products\Http\Controllers\StyleController;
use Modules\Products\Http\Controllers\TagController;

Route::prefix('v1/core')->group(function () {

    // =====================================================================================
    // =============================== Productos ===========================================
    // =====================================================================================
    Route::get('products', [ProductVariantController::class, 'index']);
    //
    Route::post('products', [ProductVariantController::class, 'store']);
    //
    Route::get('products/suggestions/{name}', [ProductVariantController::class, 'suggestions']);
    //
    Route::get('products/{product}', [ProductVariantController::class, 'show']);
    //
    Route::patch('products/{product}', [ProductVariantController::class, 'update']);
    // =====================================================================================
    // =============================== Marcas ==============================================
    // =====================================================================================
    // Todos pueden ver las categorías
    Route::get('brands', [BrandController::class, 'index']);
    // Solo el administrador puede crear
    Route::post('brands', [BrandController::class, 'store']);
    // Visualizar una categoría
    Route::get('brands/{brand}', [BrandController::class, 'show']);
    // Actualizar una categoría
    Route::patch('brands/{brand}', [BrandController::class, 'update']);
    // Eliminar una categoría
    Route::delete('brands/{brand}', [BrandController::class, 'destroy']);


    // =====================================================================================
    // =============================== Categorías ==========================================
    // =====================================================================================
    // Todos pueden ver las categorías
    Route::get('categories', [CategoryController::class, 'index']);
    // Solo el administrador puede crear
    Route::post('categories', [CategoryController::class, 'store']);
    // Visualizar una categoría
    Route::get('categories/{category}', [CategoryController::class, 'show']);
    // Actualizar una categoría
    Route::patch('categories/{category}', [CategoryController::class, 'update']);
    // Eliminar una categoría
    Route::delete('categories/{category}', [CategoryController::class, 'destroy']);

    // =====================================================================================
    // =============================== Colores =============================================
    // =====================================================================================

    // Todos pueden ver los colores
    Route::get('colors', [ColorController::class, 'index']);
    // Solo el administrador puede crear
    Route::post('colors', [ColorController::class, 'store']);
    // Visualizar un color
    Route::get('colors/{color}', [ColorController::class, 'show']);
    // Actualizar un color
    Route::patch('colors/{color}', [ColorController::class, 'update']);
    // Eliminar un color
    Route::delete('colors/{color}', [ColorController::class, 'destroy']);

    // =====================================================================================
    // =============================== Tallas ==============================================
    // =====================================================================================

    // Todos pueden ver las tallas
    Route::get('sizes', [SizeController::class, 'index']);
    // Solo el administrador puede crear
    Route::post('sizes', [SizeController::class, 'store']);
    // Visualizar una talla
    Route::get('sizes/{size}', [SizeController::class, 'show']);
    // Actualizar una talla
    Route::patch('sizes/{size}', [SizeController::class, 'update']);
    // Eliminar una talla
    Route::delete('sizes/{size}', [SizeController::class, 'destroy']);

    // =====================================================================================
    // =============================== Tags ================================================
    // =====================================================================================

    // Todos pueden ver los tags
    Route::get('tags', [TagController::class, 'index']);
    // Solo el administrador puede crear
    Route::post('tags', [TagController::class, 'store']);
    // Visualizar un tag
    Route::get('tags/{tag}', [TagController::class, 'show']);
    // Actualizar un tag
    Route::patch('tags/{tag}', [TagController::class, 'update']);
    // Eliminar un tag
    Route::delete('tags/{tag}', [TagController::class, 'destroy']);
    // =====================================================================================
    // =============================== Estilos ==========================================
    // =====================================================================================

    // Todos pueden ver las categorías
    Route::get('styles', [StyleController::class, 'index']);
    // Solo el administrador puede crear
    Route::post('styles', [StyleController::class, 'store']);
    // Visualizar una categoría
    Route::get('styles/{style}', [StyleController::class, 'show']);
    // Actualizar una categoría
    Route::patch('styles/{style}', [StyleController::class, 'update']);
    // Eliminar una categoría
    Route::delete('styles/{style}', [StyleController::class, 'destroy']);

    // =====================================================================================
    // =============================== Materiales ==========================================
    // =====================================================================================

    // Todos pueden ver las categorías
    Route::get('materials', [MaterialController::class, 'index']);
    // Solo el administrador puede crear
    Route::post('materials', [MaterialController::class, 'store']);
    // Visualizar una categoría
    Route::get('materials/{material}', [MaterialController::class, 'show']);
    // Actualizar una categoría
    Route::patch('materials/{material}', [MaterialController::class, 'update']);
    // Eliminar una categoría
    Route::delete('materials/{material}', [MaterialController::class, 'destroy']);

    // =====================================================================================
    // =============================== Unidades de medicion ================================
    // =====================================================================================

    // Todos pueden ver las categorías
    Route::get('measurements', [MeasurementUnitController::class, 'index']);
    // Solo el administrador puede crear
    Route::post('measurements', [MeasurementUnitController::class, 'store']);
    // Visualizar una categoría
    Route::get('measurements/{style}', [MeasurementUnitController::class, 'show']);
    // Actualizar una categoría
    Route::patch('measurements/{style}', [MeasurementUnitController::class, 'update']);
    // Eliminar una categoría
    Route::delete('measurements/{style}', [MeasurementUnitController::class, 'destroy']);




});




Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('products', ProductsController::class)->names('products');
});
