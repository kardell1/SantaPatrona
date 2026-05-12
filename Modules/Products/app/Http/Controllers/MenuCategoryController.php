<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Modules\Products\Http\Requests\MenuCategoryRequest;
use Modules\Products\Models\MenuCategory;

class MenuCategoryController extends Controller
{
    public function index()
    {
        $data = MenuCategory::all();

        return ApiResponse::success($data, 200);
    }

    // la category solo valida el name , y que no sea algo raro con numeros
    public function store(MenuCategoryRequest $request)
    {
        //
        $validated = $request->validated();

        MenuCategory::create([
            "name" => $validated["name"],
            "code" => null, // nullo por ahora
        ]);

        return ApiResponse::success("Se ha creado existosamente", 200);
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
            "name" => $validated["name"],
        ]);

        return ApiResponse::success("Se ha actualizado exitosamente", 200);
    }

    public function destroy(MenuCategory $menuCategory)
    {
        $menuCategory->delete();

        return ApiResponse::success("Se ha eliminado exitosamente", 200);
    }
}
