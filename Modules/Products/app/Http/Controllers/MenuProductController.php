<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Products\Http\Requests\MenuProductRequest;
use Modules\Products\Models\MenuProduct;
use Modules\Products\Models\MenuProductExtra;
use Modules\Products\Models\MenuProductPortions;
use Modules\Products\Models\MenuProductVariant;
use Modules\Products\Transformers\MenuProductShowResource;

class MenuProductController extends Controller
{
    public function index(Request $request)
    {
        try {

            $category = $request->input('category');

            $query = MenuProduct::query()

                ->with([
                    "MenuProductVariants.MenuProductPortions",
                    "MenuProductExtras"
                ])

                ->select([
                    'id',
                    'name',
                    'menu_category_id'
                ]);

            if ($category) {

                $query->where(
                    'menu_category_id',
                    $category
                );
            }

            $products = $query->get();

            return ApiResponse::success(
                $products,
                200
            );
        } catch (\Throwable $th) {

            return ApiResponse::error(
                $th->getMessage(),
                500
            );
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
                $newProductVariant =  MenuProductVariant::create([
                    'name' => $presentation['name'],
                    'divisions' =>  $presentation['equivalence'],
                    //'price' =>  $presentation['price'],
                    'menu_product_id' =>  $newProduct->id,

                ]);
                // crear las porciones de venta de ese producto
                foreach ($presentation['portions'] as $portion) {
                    MenuProductPortions::create([
                        'menu_product_variant_id' => $newProductVariant->id,
                        'portion_name' =>  $portion['name'],
                        'price' =>  $portion['price'],
                        'consumed_division' => $portion['divisions'],
                    ]);
                }
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


            MenuProductExtra::where(
                'menu_product_id',
                $product->id
            )->delete();


            foreach ($validated['extras'] ?? [] as $extra) {

                MenuProductExtra::create([
                    'menu_product_id' => $product->id,

                    'price' => $extra['price'],

                    'detail' => $extra['detail'] ?? null,

                    'raw_product_id' => $extra['raw_product_id']
                ]);
            }


            MenuProductPortions::whereIn(
                'menu_product_variant_id',
                MenuProductVariant::where(
                    'menu_product_id',
                    $product->id
                )->pluck('id')
            )->delete();


            MenuProductVariant::where(
                'menu_product_id',
                $product->id
            )->delete();


            foreach ($validated['presentation'] as $presentation) {

                $newVariant = MenuProductVariant::create([

                    'name' => $presentation['name'],

                    'divisions' => $presentation['equivalence'],

                    'menu_product_id' => $product->id,
                ]);


                foreach ($presentation['portions'] as $portion) {

                    MenuProductPortions::create([

                        'menu_product_variant_id' => $newVariant->id,

                        'portion_name' => $portion['name'],

                        'price' => $portion['price'],

                        'consumed_division' => $portion['divisions'],
                    ]);
                }
            }


            if (!empty($validated['combo_id'])) {

                $product->combos()->sync([
                    $validated['combo_id']
                ]);
            } else {

                $product->combos()->detach();
            }


            $product->load([
                'variants.portions',
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
