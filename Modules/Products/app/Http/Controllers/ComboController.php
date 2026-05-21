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
        try {

            $replacementSubQuery = "
        (
            SELECT COALESCE(
                json_agg(
                    json_build_object(
                        'id', cr.id,
                        'amount', cr.amount,
                        'price', cr.price,

                        'product_name', mp_r.name,
                        'product_id', mp_r.id,

                        'variant_name', mpv_r.name,
                        'variant_id', mpv_r.id
                    )
                ),
                '[]'::json
            )

            FROM combo_replaceaments cr

            LEFT JOIN menu_product_variants mpv_r
                ON cr.menu_product_variant_id = mpv_r.id

            LEFT JOIN menu_products mp_r
                ON mpv_r.menu_product_id = mp_r.id

            WHERE cr.combo_item_id = ci.id
        )
        ";

            $comboItemsSubQuery = DB::table('combo_items as ci')

                ->leftJoin(
                    'menu_product_variants as mpv',
                    'ci.menu_product_variant_id',
                    '=',
                    'mpv.id'
                )

                ->leftJoin(
                    'menu_products as mp',
                    'mpv.menu_product_id',
                    '=',
                    'mp.id'
                )

                ->selectRaw("
                ci.combo_id,

                json_agg(
                    json_build_object(

                        'item_id', ci.id,
                        'amount', ci.amount,
                        'price', ci.price,
                        'replaceable', ci.replaceable,

                        'product_name', mp.name,
                        'product_id', mp.id,

                        'variant_name', mpv.name,
                        'variant_id', mpv.id,

                        'combo_replaceaments',
                        $replacementSubQuery
                    )
                ) as combo_items
            ")

                ->groupBy('ci.combo_id');

            $query = DB::table('combos as co')

                ->leftJoinSub($comboItemsSubQuery, 'items', function ($join) {
                    $join->on('co.id', '=', 'items.combo_id');
                })

                ->select(
                    'co.id',
                    'co.name as combo_name',
                    'co.description as combo_description',
                    'items.combo_items'
                )

                ->get();

            $query = $query->map(function ($item) {
                $item->combo_items = json_decode($item->combo_items, true);
                return $item;
            });

            return ApiResponse::success(
               $query,
                200
            );

        } catch (\Throwable $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ], 500);
        }
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

    public function show(Combo $combo)
    {
        try {

            $replacementSubQuery = "
        (
            SELECT COALESCE(
                json_agg(
                    json_build_object(
                        'id', cr.id,
                        'amount', cr.amount,
                        'price', cr.price,

                        'product_name', mp_r.name,
                        'product_id', mp_r.id,

                        'variant_name', mpv_r.name,
                        'variant_id', mpv_r.id
                    )
                ),
                '[]'::json
            )

            FROM combo_replaceaments cr

            LEFT JOIN menu_product_variants mpv_r
                ON cr.menu_product_variant_id = mpv_r.id

            LEFT JOIN menu_products mp_r
                ON mpv_r.menu_product_id = mp_r.id

            WHERE cr.combo_item_id = ci.id
        )
        ";

            $comboItemsSubQuery = DB::table('combo_items as ci')

                ->leftJoin(
                    'menu_product_variants as mpv',
                    'ci.menu_product_variant_id',
                    '=',
                    'mpv.id'
                )

                ->leftJoin(
                    'menu_products as mp',
                    'mpv.menu_product_id',
                    '=',
                    'mp.id'
                )

                ->selectRaw("
                ci.combo_id,

                json_agg(
                    json_build_object(

                        'item_id', ci.id,
                        'amount', ci.amount,
                        'price', ci.price,
                        'replaceable', ci.replaceable,

                        'product_name', mp.name,
                        'product_id', mp.id,

                        'variant_name', mpv.name,
                        'variant_id', mpv.id,

                        'combo_replaceaments',
                        $replacementSubQuery
                    )
                ) as combo_items
            ")

                ->groupBy('ci.combo_id');

            $query = DB::table('combos as co')

                ->leftJoinSub($comboItemsSubQuery, 'items', function ($join) {
                    $join->on('co.id', '=', 'items.combo_id');
                })

                ->select(
                    'co.id',
                    'co.name as combo_name',
                    'co.description as combo_description',
                    'items.combo_items'
                )

                ->where('co.id', $combo->id)

                ->first();


            if ($query && $query->combo_items) {
                $query->combo_items = json_decode($query->combo_items, true);
            }

            return ApiResponse::success(
                $query,
                200
            );

        } catch (\Throwable $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ], 500);
        }
    }


    // verificar esta ruta --------------
    public function update(ComboRequest $request, Combo $combo)
    {
        DB::beginTransaction();

        try {
           DB::commit();

            $validated = $request->validated();

            // actualizar datos principales
            $combo->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'status' => $validated['status'] ?? true,
            ]);


            // eliminar replacements antiguos
            ComboReplaceament::whereIn(
                'combo_item_id',
                $combo->comboItems()->pluck('id')
            )->delete();

            // eliminar items antiguos
            ComboItem::where('combo_id', $combo->id)->delete();

            // volver a registrar items
            foreach ($validated['products'] as $comboItem) {

                $newComboItem = ComboItem::create([
                    'combo_id' => $combo->id,
                    'menu_product_variant_id' => $comboItem['item_id'],
                    'amount' => $comboItem['amount'],
                    'price' => $comboItem['price'],
                    'replaceable' => $comboItem['replaceable'],
                ]);

                // guardar replacements
                foreach (($comboItem['replacement'] ?? []) as $replacement) {

                    ComboReplaceament::create([
                        'combo_item_id' => $newComboItem->id,
                        'menu_product_variant_id' => $replacement['item_id'],
                        'amount' => $replacement['amount'],
                        'price' => $replacement['price'],
                    ]);
                }
            }


            return ApiResponse::success(
                 $combo  ,    200
            );
        } catch (\Throwable $e) {

            DB::rollBack();

            return ApiResponse::error(
                $e->getMessage(),
                500
            );
        }
    }
    public function destroy($id) {}
}
