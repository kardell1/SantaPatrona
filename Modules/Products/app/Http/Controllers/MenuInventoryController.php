<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Products\Http\Requests\MenuInventoryRequest;
use Modules\Products\Models\MenuInventory;
use Modules\Products\Models\MenuProductVariant;

class MenuInventoryController extends Controller
{

    public function index(Request $request)
    {
        try {

            $category = $request->input('category');
            // mpv.divisions
            $query = DB::table('menu_inventories as mi')
                ->leftJoin('menu_product_variants as mpv', 'mi.menu_product_variant_id', '=', 'mpv.id')
                ->leftJoin('menu_products as mp', 'mpv.menu_product_id', '=', 'mp.id')
                ->leftJoin('menu_flavors as mf', 'mi.menu_flavor_id', '=', 'mf.id')
                ->leftJoin('menu_categories as mc', 'mp.menu_category_id', '=', 'mc.id')
                ->select(
                    'mi.id',
                    //DB::raw('(mi.amount / mpv.divisions) as amount_available'),
                    DB::raw('
                        CASE
                            WHEN mpv.divisions > 0
                            THEN ROUND(mi.amount / mpv.divisions, 2)
                            ELSE 0
                        END as amount_available
                    '),
                    'mi.reception_date',
                    'mi.expired_date',
                    'mf.name as flavor_name',
                    'mp.name as product_name',
                    'mpv.name as variant_name',
                    'mc.name as category',
                    'mpv.sold_price'
                );

            if ($category) {
                $query->where('mc.id', $category);
            }

            $inventories = $query->get();

            return ApiResponse::success(
                $inventories,
                200
            );
        } catch (\Throwable $th) {

            return ApiResponse::error(
                $th->getMessage(),
                500
            );
        }
    }

    public function store(MenuInventoryRequest $request)
    {
        DB::beginTransaction();

        try {

            $validated = $request->validated();

            $foundInventory = MenuInventory::where('menu_product_variant_id',  $validated['product_variant_id'])
                ->where("reception_date",  $validated['reception_date'])
                ->where("menu_flavor_id", $validated['flavor_id'])
                ->first();

            $foundProductVariant = MenuProductVariant::find($validated['product_variant_id']);
            //
            $newStock = $validated['amount'] * $foundProductVariant['divisions'];
            //
            if ($foundInventory) {
                $foundInventory->amount += $newStock;
                $foundInventory->manufacturing_cost = $validated['manufacturing_cost'];
                $foundInventory->expired_date = $validated['expired_date'];
                $foundInventory->save();
            } else {
                MenuInventory::create([
                    'menu_product_variant_id' => $validated['product_variant_id'],
                    'manufacturing_cost' => $validated['manufacturing_cost'],
                    'amount' => $newStock,
                    'reception_date' => $validated['reception_date'],
                    'expired_date' => $validated['expired_date'],
                    'employee_id' => 1, // luego sacar del token
                    'menu_flavor_id' => $validated['flavor_id'],
                ]);
            }

            DB::commit();

            return ApiResponse::success(
                "Agregado exitosamente",
                201
            );
        } catch (\Throwable $e) {

            DB::rollBack();

            return ApiResponse::error(
                $e->getMessage(),
                500,
                "Error al registrar el inventario"
            );
        }
    }

    public function show(int $id)
    {
        try {
            $query = DB::table('menu_inventories as mi')
                ->leftJoin('menu_product_variants as mpv', 'mi.menu_product_variant_id', '=', 'mpv.id')
                ->leftJoin('menu_products as mp', 'mpv.menu_product_id', '=', 'mp.id')
                ->leftJoin('menu_flavors as mf', 'mi.menu_flavor_id', '=', 'mf.id')
                ->leftJoin('menu_categories as mc', 'mp.menu_category_id', '=', 'mc.id')
                ->select(
                    'mi.id',
                    //DB::raw('(mi.amount / mpv.divisions) as amount_available'),
                    DB::raw('
                        CASE
                            WHEN mpv.divisions > 0
                            THEN ROUND(mi.amount / mpv.divisions, 2)
                            ELSE 0
                        END as amount_available
                    '),
                    'mi.reception_date',
                    'mi.expired_date',
                    'mf.name as flavor_name',
                    'mp.name as product_name',
                    'mpv.name as variant_name',
                    'mc.name as category',
                    'mpv.sold_price'
                )->where('mi.id' , $id);

            $inventories = $query->first();

            return ApiResponse::success(
                $inventories,
                200
            );
        } catch (\Throwable $th) {

            return ApiResponse::error(
                $th->getMessage(),
                500
            );
        }
    }

    public function update(Request $request, $id) {}
    public function destroy($id) {}
}
