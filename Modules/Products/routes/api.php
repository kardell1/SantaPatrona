<?php

use Illuminate\Support\Facades\Route;
use Modules\HumanResources\Http\Controllers\BrandController;
use Modules\Products\Http\Controllers\CategoryController;
use Modules\Products\Http\Controllers\ComponentProductController;
use Modules\Products\Http\Controllers\MaterialController;
use Modules\Products\Http\Controllers\ProductController;
use Modules\Products\Http\Controllers\SizeController;
use Modules\Products\Http\Controllers\StyleController;
use Modules\Products\Http\Controllers\TagController;
use Modules\Products\Http\Controllers\UnitTypeController;

Route::prefix('v1/core')->group(function () {
    // Mover colores , tallas hacia el modulo de inventarios

    // =====================================================================================
    // =============================== Productos ===========================================
    // =====================================================================================
    Route::get('products', [ProductController::class, 'index']);
    Route::post('products', [ProductController::class, 'store']);
    Route::get('products/suggestions/{name}', [ProductController::class, 'suggestions']);
    Route::get('products/{product}', [ProductController::class, 'show']);
    Route::patch('products/{product}', [ProductController::class, 'update']);
    // =====================================================================================
    // =============================== Marcas ==============================================
    // =====================================================================================

    Route::get('brands', [BrandController::class, 'index']);
    Route::post('brands', [BrandController::class, 'store']);
    Route::get('brands/{brand}', [BrandController::class, 'show']);
    Route::patch('brands/{brand}', [BrandController::class, 'update']);
    Route::delete('brands/{brand}', [BrandController::class, 'destroy']);

    // =====================================================================================
    // =============================== Categorías ==========================================
    // =====================================================================================
    // Todos pueden ver las categorías
    Route::get('categories', [CategoryController::class, 'index']);
    Route::post('categories', [CategoryController::class, 'store']);
    Route::get('categories/{category}', [CategoryController::class, 'show']);
    Route::get('categories/components/{category}', [CategoryController::class, 'components']);
    Route::patch('categories/{category}', [CategoryController::class, 'update']);
    Route::delete('categories/{category}', [CategoryController::class, 'destroy']);

    // =====================================================================================
    // =============================== Colores =============================================
    // =====================================================================================

    /* // Todos pueden ver los colores */
    /* Route::get('colors', [ColorController::class, 'index']); */
    /* // Solo el administrador puede crear */
    /* Route::post('colors', [ColorController::class, 'store']); */
    /* // Visualizar un color */
    /* Route::get('colors/{color}', [ColorController::class, 'show']); */
    /* // Actualizar un color */
    /* Route::patch('colors/{color}', [ColorController::class, 'update']); */
    /* // Eliminar un color */
    /* Route::delete('colors/{color}', [ColorController::class, 'destroy']); */
    /**/
    // =====================================================================================
    // =============================== Tallas ==============================================
    // =====================================================================================

    Route::get('sizes', [SizeController::class, 'index']);
    Route::post('sizes', [SizeController::class, 'store']);
    Route::get('sizes/{size}', [SizeController::class, 'show']);
    Route::patch('sizes/{size}', [SizeController::class, 'update']);
    Route::delete('sizes/{size}', [SizeController::class, 'destroy']);

    // =====================================================================================
    // =============================== Tags ================================================
    // =====================================================================================

    Route::get('tags', [TagController::class, 'index']);
    Route::get('tags/suggestions/{name}', [TagController::class, 'suggestions']);
    Route::post('tags', [TagController::class, 'store']);
    Route::get('tags/{tag}', [TagController::class, 'show']);
    Route::patch('tags/{tag}', [TagController::class, 'update']);
    Route::delete('tags/{tag}', [TagController::class, 'destroy']);

    // =====================================================================================
    // =============================== Estilos ==========================================
    // =====================================================================================

    Route::get('styles', [StyleController::class, 'index']);
    Route::post('styles', [StyleController::class, 'store']);
    Route::get('styles/{style}', [StyleController::class, 'show']);
    Route::patch('styles/{style}', [StyleController::class, 'update']);
    Route::delete('styles/{style}', [StyleController::class, 'destroy']);

    // =====================================================================================
    // =============================== Materiales ==========================================
    // =====================================================================================

    Route::get('materials', [MaterialController::class, 'index']);
    Route::post('materials', [MaterialController::class, 'store']);
    Route::get('materials/{material}', [MaterialController::class, 'show']);
    Route::patch('materials/{material}', [MaterialController::class, 'update']);
    Route::delete('materials/{material}', [MaterialController::class, 'destroy']);

    // =====================================================================================
    // =============================== Unidades de medicion ================================
    // =====================================================================================

    Route::get('unit-types', [UnitTypeController::class, 'index']);
    Route::get('unit-types/suggestions/{name}', [UnitTypeController::class, 'suggestions']);
    Route::post('unit-types', [UnitTypeController::class, 'store']);
    Route::get('unit-types/{unitType}', [UnitTypeController::class, 'show']);
    Route::patch('unit-types/{unitType}', [UnitTypeController::class, 'update']);
    Route::delete('unit-types/{unitType}', [UnitTypeController::class, 'destroy']);

    // =====================================================================================
    // =============================== Componentes de productos ================================
    // =====================================================================================

    Route::get('components', [ComponentProductController::class, 'index']);
    Route::post('components', [ComponentProductController::class, 'store']);
    Route::get('components/{component}', [ComponentProductController::class, 'show']);
    Route::patch('components/{component}', [ComponentProductController::class, 'update']);
    Route::delete('components/{component}', [ComponentProductController::class, 'destroy']);

});

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {});
