<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Products\Http\Requests\MenuInventoryRequest;
use Modules\Products\Models\MenuInventory;

class MenuInventoryController extends Controller
{
    public function index()
    {
        // vemos todos los inventarios que tenemos , vision simplificada
        $data = MenuInventory::all();

        return ApiResponse::success(
            [
                "info" =>  "formato de respuesta va ser",
                "data" => [
                    "category" => "Almaneda",
                    "amount" => "20",
                    "reception_date" => "20/05/2026",
                    "expired_date" => "20/05/2026",
                    "flavor_name" => " (va el sabor) frutilla",
                    "product_name" => "nombre del producto" ,
                    "variant_name" => "nombre de la subdivision",
                ]
            ],
            201
        );
    }
    public function store(MenuInventoryRequest $request)
    {
        DB::beginTransaction();

        try {

            $validated = $request->validated();

            // aun falta la conversion de la cantidad al momento de agregar el item
            // para hacerlo de forma de un entero y no trabajar con fracciones o decimales
            //
            $inventory = MenuInventory::create([
                'menu_product_variant_id' => $validated['product_variant_id'],
                'manufacturing_cost' => $validated['manufacturing_cost'],
                'amount' => $validated['amount'],
                'reception_date' => $validated['reception_date'],
                'expired_date' => $validated['expired_date'],
                'employee_id' => 1, // luego sacar del token
                'menu_flavor_id' => $validated['flavor_id'],
            ]);

            DB::commit();

            return ApiResponse::success(
                $inventory,
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

    public function show($id)
    {
        return view('products::show');
    }
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}
