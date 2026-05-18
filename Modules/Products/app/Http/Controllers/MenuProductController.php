<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Products\Http\Requests\MenuProductRequest;
use Modules\Products\Models\MenuProduct;
use Modules\Products\Models\MenuProductExtra;
use Modules\Products\Models\MenuProductUnit;
use Modules\Products\Models\MenuProductVariant;
use Modules\Products\Transformers\MenuProductShowResource;

class MenuProductController extends Controller
{
    public function index(Request $request)
    {
        try {

            $category = $request->input("category");

            $query = DB::table("menu_products as mp")
                ->leftJoin(
                    "menu_categories as mc",
                    "mc.id",
                    "=",
                    "mp.menu_category_id",
                )
                ->leftJoin(
                    "recipe_books as rb",
                    "mp.id",
                    "=",
                    "rb.menu_product_id"
                )
                ->leftJoin(
                    "raw_products as rp",
                    "rp.id",
                    "=",
                    "rb.raw_product_id"
                )
                ->leftJoin(
                    'menu_product_units as mpu',
                    'mp.id',
                    '=',
                    'mpu.menu_product_id'
                )
                ->select(
                    "mc.name as menu_product_category",
                    "mp.id as menu_product_id",
                    "mp.name as menu_product_name",

                    DB::raw("
                    COALESCE(
                        json_agg(
                            DISTINCT jsonb_build_object(
                                'detail', rb.detail,
                                'raw_product_name', rp.name
                            )
                        ) FILTER (WHERE rb.id IS NOT NULL),
                        '[]'
                    ) as recipe
                "),

                    DB::raw("
                    COALESCE(
                        json_agg(
                            DISTINCT jsonb_build_object(
                                'price', mpu.price,
                                'presentation', mpu.name,
                                'equivalence', mpu.equivalence
                            )
                        ) FILTER (WHERE mpu.id IS NOT NULL),
                        '[]'
                    ) as presentations
                "),
                )
                ->groupBy(
                    "mc.name",
                    "mp.id",
                    "mp.name",
                );

            if ($category) {
                $query->where("mp.menu_category_id", $category);
            }

            $data = $query->get();

            $data->transform(function ($item) {
                $item->recipe = json_decode($item->recipe, true);
                $item->presentations = json_decode($item->presentations, true);

                return $item;
            });

            return ApiResponse::success($data, 200);
        } catch (\Throwable $th) {

            return ApiResponse::error($th->getMessage(), 500);
        }
    }


    //
    public function store(MenuProductRequest $request)
    {
        //return ApiResponse::success( "data" , 201);
        try {
            $validated = $request->validated();

            $newProduct = MenuProduct::create([
                "name" => $validated['name'],
                "menu_category_id" => $validated['menu_category_id'],
            ]);
            // aumentar la parte de los extras

            foreach ($validated['extras'] as $extra) {
                MenuProductExtra::create([
                    'menu_product_id' => $newProduct->id,
                    'price' => $extra['price'],
                    'details' => $extra['details'],
                    'raw_product_id' => $extra['raw_product_id']
                ]);
            }

            // esto es la variante del producto
            foreach ($validated['presentation'] as $presentation) {
                MenuProductVariant::create([
                    'name' => $presentation['name'],
                    'divisions' =>  $presentation['equivalence'],
                    //'price' =>  $presentation['price'],
                    'menu_product_id' =>  $newProduct->id,

                ]);
            }

            if ($validated['combo_id']) {
                $newProduct->combos()->attach($validated['combo_id']);
            }

            return ApiResponse::success($newProduct, 201);
        } catch (\DomainException $e) {
            return ApiResponse::error(
                $e->getMessage(),
                407,
                "Error al crear el producto",
            );
        } catch (\Throwable $e) {
            return ApiResponse::error(
                $e->getMessage(),
                500,
                "Error interno del servidor",
            );
        }
    }

    public function show(MenuProduct $menuProduct)
    {
        try {

            $data = $menuProduct->load([
                'menuProductUnits',
                'menuProductExtras.rawProduct',
                'combos',
                'menuCategory'
            ]);
            $clean = new MenuProductShowResource($data);
            return ApiResponse::success(
                $clean,
                200
            );
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return ApiResponse::error(
                "Producto no encontrado",
                404,
                "Error al obtener el producto"
            );
        } catch (\Throwable $e) {

            return ApiResponse::error(
                $e->getMessage(),
                500,
                "Error interno del servidor"
            );
        }
    }

    public function update(MenuProductRequest $request, string $id)
    {
        try {

            $validated = $request->validated();

            $product = MenuProduct::findOrFail($id);

            $product->update([
                "name" => $validated['name'],
                "menu_category_id" => $validated['menu_category_id'],
            ]);
            // eliminar extras antiguos
            MenuProductExtra::where(
                'menu_product_id',
                $product->id
            )->delete();
            // crear nuevos extras
            foreach ($validated['extras'] as $extra) {

                MenuProductExtra::create([
                    'menu_product_id' => $product->id,
                    'price' => $extra['price'],
                    'details' => $extra['details'],
                    'raw_product_id' => $extra['raw_product_id']
                ]);
            }
            //
            MenuProductUnit::where(
                'menu_product_id',
                $product->id
            )->delete();
            // crear nuevas presentaciones
            foreach ($validated['presentation'] as $presentation) {

                MenuProductUnit::create([
                    'name' => $presentation['name'],
                    'equivalence' => $presentation['equivalence'],
                    'price' => $presentation['price'],
                    'menu_product_id' => $product->id,
                ]);
            }

            if (!empty($validated['combo_id'])) {

                $product->combos()->sync([
                    $validated['combo_id']
                ]);
            } else {

                $product->combos()->detach();
            }
            // refrescar relaciones
            $product->load([
                'menuProductUnits',
                'extras',
                'combos'
            ]);

            return ApiResponse::success(
                $product,
                200
            );
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return ApiResponse::error(
                "Producto no encontrado",
                404,
                "Error al actualizar el producto",
            );
        } catch (\DomainException $e) {

            return ApiResponse::error(
                $e->getMessage(),
                407,
                "Error al actualizar el producto",
            );
        } catch (\Throwable $e) {

            return ApiResponse::error(
                $e->getMessage(),
                500,
                "Error interno del servidor",
            );
        }
    }


    public function destroy(MenuProduct $menuProduct)
    {
        $menuProduct->delete();

        return ApiResponse::success(
            ["message" => "Producto eliminado correctamente"],
            200,
        );
    }
}
