<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Supports\NormalizedResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Products\Http\Requests\ProductStoreRequest;
use Modules\Products\Models\Product;
use Modules\Products\Models\ProductDetail;
use Modules\Products\Models\ProductVariant;

class ProductController extends Controller
{
    public function index()
    {
        return view('products::index');
    }

    public function store(ProductStoreRequest $request)
    {
        // product - create
        // cada controllador verifica el permiso que necesita , es igual a la accion
        try {
            $validated = $request->validated();
            // aca tambien comprobar permisos
            $data = DB::transaction(function () use ($validated) {
                $newProduct = Product::create([
                    'name' => $validated['name'],
                    'category_id' => $validated['category_id']
                ]);
                // sino tiene variantes copiamos el mismo nombre
                $newVariant = ProductVariant::create([
                    'product_id' => $newProduct->id,
                    'name' => $validated['variant_name'],
                    'divisions' => $validated['divisions'] ?? null,
                    'sold_suggest_price' => $validated['variant_sold_suggest_price'],
                    'status' => $validated['status']
                ]);

                // Asociar materiales
                $newProduct->materials()->attach($validated['materials']);
                // Asociar colores
                $newProduct->colors()->attach($validated['colors']);
                // Asociar tallas
                $newVariant->sizes()->attach($validated['sizes']);
                // Asociar estilos
                $newProduct->styles()->attach($validated['styles']);
                // Asociar tags
                $newVariant->tags()->attach($validated['tags']);

                // Crear detalle de producto
                ProductDetail::create([
                    'product_variant_id' => $newVariant->id,
                    'unity' => $validated['unity'],
                    'unity_type' => $validated['unity_type'],
                    'description' => $validated['description']
                ]);
                // falta la funcion para agregar la imagen o vincularla
            });

            return NormalizedResponse::success($data, 'Creado correctamente');
        } catch (\Throwable $th) {
            return NormalizedResponse::error("Errores al crear", $th->getMessage());
        }
    }

    public function show($id)
    {
        return view('products::show');
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
