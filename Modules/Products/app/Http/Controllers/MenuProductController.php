<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Products\Http\Requests\MenuProductRequest;
use Modules\Products\Models\MenuProduct;

class MenuProductController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->input("category");

        $query = DB::table("menu_products as mp")
            ->leftJoin(
                "menu_categories as mc",
                "mc.id",
                "=",
                "mp.menu_category_id",
            )
            ->leftJoin("recipe_books as rb", "mp.id", "=", "rb.menu_product_id")
            ->leftJoin("raw_products as rp", "rp.id", "=", "rb.raw_product_id")
            ->select(
                "mc.name as menu_product_category",
                "mp.id as menu_product_id",
                "mp.name as menu_product_name",
                "mp.manufacturing_cost as menu_product_manufacturing_cost",
                DB::raw("
                    COALESCE(
                        json_agg(
                            json_build_object(
                                'detail', rb.detail,
                                'raw_product_name', rp.name
                            )
                        ) FILTER (WHERE rb.id IS NOT NULL),
                        '[]'
                    ) as recipe
                "),
            )
            ->groupBy("mc.name", "mp.id", "mp.name", "mp.manufacturing_cost");

        if ($category) {
            $query->where("mp.menu_category_id", $category);
        }

        $data = $query->get();

        $data->transform(function ($item) {
            $item->recipe = json_decode($item->recipe, true);
            return $item;
        });

        return ApiResponse::success($data, 200);
    }
    //
    public function store(MenuProductRequest $request)
    {
        $validated = $request->validated();

        $newProduct = MenuProduct::create($validated);

        return ApiResponse::success($newProduct, 201);
    }
    //
    public function show(MenuProduct $menuProduct)
    {
        return ApiResponse::success($menuProduct, 200);
    }
    //
    public function update(
        MenuProductRequest $request,
        MenuProduct $menuProduct,
    ) {
        $validated = $request->validated();

        $menuProduct->update($validated);

        return ApiResponse::success($menuProduct->fresh(), 200);
    }
    //
    public function destroy(MenuProduct $menuProduct)
    {
        $menuProduct->delete();

        return ApiResponse::success(
            ["message" => "Producto eliminado correctamente"],
            200,
        );
    }
}
