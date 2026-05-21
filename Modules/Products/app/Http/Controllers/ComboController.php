<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Support\ApiResponse;
use Illuminate\Support\Facades\DB;
use Modules\Products\Http\Requests\ComboRequest;
use Modules\Products\Models\Combo;
use Modules\Products\Models\ComboItem;
use Modules\Products\Models\ComboReplaceament;

class ComboController extends Controller
{
    public function index()
    {
        $combos = Combo::all();

        return ApiResponse::success($combos, 200);
    }
    public function store(ComboRequest $request)
    {
        DB::beginTransaction();

        try {

            $validated = $request->validated();

            $new_combo = Combo::create([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'status' => $validated['status'] ?? true,
            ]);

            foreach ($validated['products'] as $comboItem) {

                $newItemCombo = ComboItem::create([
                    'combo_id' => $new_combo->id,
                    'menu_product_variant_id' => $comboItem['item_id'],
                    'amount' => $comboItem['amount'],
                    'price' => $comboItem['price'],
                    'replaceable' => $comboItem['replaceable'],
                ]);

                foreach (($comboItem['replacement'] ?? []) as $replaceable) {

                    ComboReplaceament::create([
                        'combo_item_id' => $newItemCombo->id,
                        'menu_product_variant_id' => $replaceable['item_id'],
                        'amount' => $replaceable['amount'],
                        'price' => $replaceable['price'],
                    ]);
                }
            }

            DB::commit();

            return ApiResponse::success(
                "Combo creado exitosamente",
                200
            );
        } catch (\Throwable $th) {

            DB::rollBack();

            return ApiResponse::error(
                "Error al crear el combo",
                500,
                $th->getMessage()
            );
        }
    }
    public function show(Combo $combos)
    {
        $combos->load('menuProducts');

        return ApiResponse::success($combos, 200);
    }

    //verificar esta ruta --------------
    public function update(ComboRequest $request, Combo $combo)
    {
        $validated = $request->validated();

        // actualizar datos principales
        $combo->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'status' => $validated['status'],
        ]);

        // eliminar relaciones actuales
        $combo->menuProducts()->detach();

        // volver a registrar productos
        if (count($validated['products']) > 0) {

            $Ids = collect($validated['products'])
                ->pluck('item_id')
                ->unique()
                ->values();

            $combo->menuProducts()->attach($Ids);
        }

        // recargar relaciones
        $combo->load('menuProducts');

        return ApiResponse::success($combo, 200);
    }

    public function destroy($id) {}
}
