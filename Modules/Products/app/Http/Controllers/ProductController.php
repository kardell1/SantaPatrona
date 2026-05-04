<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // $category = $request->input("category");

        // $query = DB::table("menu_products as mp")
        //     ->leftJoin(
        //         "menu_categories as mc",
        //         "mc.id",
        //         "=",
        //         "mp.menu_category_id",
        //     )
        //     ->leftJoin("recipe_books as rb", "mp.id", "=", "rb.menu_product_id")
        //     ->leftJoin("raw_products as rp", "rp.id", "=", "rb.raw_product_id")
        //     ->select(
        //         "mc.name as menu_product_category",
        //         "mp.id as menu_product_id",
        //         "mp.name as menu_product_name",
        //         "mp.manufacturing_cost as menu_product_manufacturing_cost",
        //         DB::raw("
        //             COALESCE(
        //                 json_agg(
        //                     json_build_object(
        //                         'detail', rb.detail,
        //                         'raw_product_name', rp.name
        //                     )
        //                 ) FILTER (WHERE rb.id IS NOT NULL),
        //                 '[]'
        //             ) as recipe
        //         "),
        //     )
        //     ->groupBy("mc.name", "mp.id", "mp.name", "mp.manufacturing_cost");

        // if ($category) {
        //     $query->where("mp.menu_category_id", $category);
        // }

        // $data = $query->get();

        // $data->transform(function ($item) {
        //     $item->recipe = json_decode($item->recipe, true);
        //     return $item;
        // });

        // return ApiResponse::success($data, 200);
    }

    public function store(Request $request) {}

    public function show($id)
    {
        return view("products::show");
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
