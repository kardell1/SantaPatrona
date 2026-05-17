<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Support\ApiResponse;
use Illuminate\Support\Facades\DB;
use Modules\Products\Http\Requests\MenuCategoryRequest;
use Modules\Products\Models\MenuCategory;

class MenuCategoryController extends Controller
{
    public function index()
    {
        $data = MenuCategory::all();

        return ApiResponse::success($data, 200);
    }

public function store(MenuCategoryRequest $request)
{
    DB::beginTransaction();

    try {
        $validated = $request->validated();

        $newCategory = MenuCategory::create([
            "name" => $validated["category"],
            "code" => null, // null por ahora
        ]);

        DB::commit();

        return ApiResponse::success($newCategory, 200);

    } catch (\Throwable $e) {

        DB::rollBack();

        return ApiResponse::error(
            "Error al crear la categoría",
            $e->getMessage(),
            500
        );
    }
}

    public function show(MenuCategory $menuCategory)
    {
        return ApiResponse::success($menuCategory, 200);
    }

    public function update(
        MenuCategoryRequest $request,
        MenuCategory $menuCategory,
    ) {
        $validated = $request->validated();

        $menuCategory->update([
            "name" => $validated["category"],
        ]);

        return ApiResponse::success("Se ha actualizado exitosamente", 200);
    }

    public function destroy(MenuCategory $menuCategory)
    {
        $menuCategory->delete();

        return ApiResponse::success("Se ha eliminado exitosamente", 200);
    }
}
