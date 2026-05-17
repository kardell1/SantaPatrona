<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Support\ApiResponse;
use Illuminate\Support\Facades\DB;
use Modules\Products\Http\Requests\ComboRequest;
use Modules\Products\Models\Combo;

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
                'status' => $validated['status'],
            ]);

            if (count($validated['products']) > 0) {

                $Ids = collect($validated['products'])
                    ->pluck('item_id')
                    ->unique()
                    ->values();

                $new_combo->menuProducts()->attach($Ids);
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
