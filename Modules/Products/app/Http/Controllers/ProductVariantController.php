<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Supports\NormalizedResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Products\Filters\ProductFilters;
use Modules\Products\Http\Formatters\ProductFomatter;
use Modules\Products\Http\Requests\ProductStoreRequest;
use Modules\Products\Models\Product;
use Modules\Products\Models\ProductVariant;

class ProductVariantController extends Controller
{
    protected $productFilters;
    protected $productFormatter;
    public function __construct(
        ProductFilters $productFilters,
        ProductFomatter $productFomatter
    ) {
        $this->productFilters = $productFilters;
        $this->productFormatter = $productFomatter;
    }
    // tag ,color , material , style ,brand , price , size
    public function index(Request $request)
    {
        try {
            $paginate = $request->input('paginate', 15);
            $query = Product::query();

            $query = $this->productFilters->apply(
                $query->select('id', 'name', 'status', 'gender', 'category_id', 'brand_id'),
                $request->all()
            );

            $products = $query->paginate($paginate);
            //$formatter = $query->get();
            //$formatter = $this->productFormatter->cleanIndexProduct($query->get());
            $products->setCollection(
                $this->productFormatter->cleanIndexProduct($products->getCollection())
            );
            return NormalizedResponse::successPaginated(
                $products,
                "Busqueda de productos"
            );
        } catch (\Throwable $e) {
            return NormalizedResponse::error(
                [
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                ],
                'Metodo ha fallado'
            );
        }
    }

    public function store(ProductStoreRequest $request)
    {
        try {
            $validated = $request->validated();

            $data = DB::transaction(function () use ($validated) {
                // debemos buscar si el nombre que nos envian ya existe , sino existe lo creamos
                $foundProduct = Product::where('name', $validated['name'])->first();
                // sino existe creamos el producto
                if (!$foundProduct) {
                    $foundProduct = Product::create([
                        'name' => $validated['name'],
                        'category_id' => $validated['category_id']
                    ]);
                }

                $newVariation = ProductVariant::create([
                    'product_id' => $foundProduct->id,
                    'name' => $validated['variant'],
                    'divisions' => $validated['divisions'],
                    'sold_suggest_price' => $validated['sold_suggest_price'],
                    'status' => $validated['status']
                ]);
                // establecer relaciones
                // relacionar con colores
                $foundProduct->colors()->attach($validated['colors']);
                // relacionar con materiales
                $foundProduct->materials()->attach($validated['materials']);
                // relacionar con tallas disponibles
                $newVariation->sizes()->attach($validated['sizes']);
                // relacionar con detalles
                // esto va asociado con el producto variant
                // si la unity es null , no existe el type
                $newDetails = [
                    'product_variant_id' => $newVariation->id,
                    'name' => $validated['presentation'],
                    'unity' => $validated['unity'] ?? null,
                    'unity_type' => $validated['unity_type'] ?? null,
                    'description' => $validated['details'],
                ];
                // relacionar con styles
                $foundProduct->styles()->attach($validated['styles']);
                // relacionar con tags
                $newVariation->tags()->attach($validated['tags']);
            });

            return NormalizedResponse::success(
                $data,
                'Producto creado correctamente.'
            );
        } catch (\Exception $e) {

            return NormalizedResponse::error(
                [
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                ],
                'Metodo ha fallado'
            );
        }
    }

    // Metodo : busqueda de un item mediante coincidencia de nombre
    // return : envia el nombre del producto principal
    public function suggestions(string $name)
    {
        try {
            $data = Product::query()
                ->where('name', 'ilike', "%{$name}%")
                /* ->orWhereHas('productVariants', function ($query) use ($name) { */
                /*     $query->where('name', 'ilike', "%{$name}%"); */
                /* }) */
                ->limit(10)
                ->get('name');

            return NormalizedResponse::success(
                $data,
                'Búsqueda exitosa.'
            );
        } catch (\Throwable $e) {
            return NormalizedResponse::error(
                $e->getMessage(),
                'Ocurrió un error al realizar la búsqueda.',
            );
        }
    }
    public function show($id)
    {
        //
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
