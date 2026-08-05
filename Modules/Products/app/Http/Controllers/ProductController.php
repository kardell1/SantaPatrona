<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Supports\NormalizedResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Products\Filters\ProductFilters;
use Modules\Products\Http\Formatters\ProductFomatter;
use Modules\Products\Http\Requests\ProductStoreRequest;
use Modules\Products\Models\Presentation;
use Modules\Products\Models\Product;
use Modules\Products\Models\Tag;
use Modules\Products\Models\UnitType;

class ProductController extends Controller
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
            // $formatter = $query->get();
            // $formatter = $this->productFormatter->cleanIndexProduct($query->get());
            $products->setCollection(
                $this->productFormatter->cleanIndexProduct($products->getCollection())
            );

            return NormalizedResponse::successPaginated(
                $products,
                'Busqueda de productos'
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

    public function store(ProductStoreRequest $request)
    {
        // product - create
        // cada controllador verifica el permiso que necesita , es igual a la accion
        try {
            $validated = $request->validated();
            // aca tambien comprobar permisos
            $data = DB::transaction(function () use ($validated) {
                // first or create para el producto principal
                $foundProduct = Product::firstOrCreate([
                    'name' => $validated['name'],
                    'gender' => $validated['gender'],
                    'brand_id' => $validated['brand_id'],
                    'category_id' => $validated['category_id'],
                ], [
                    'status' => $validated['status'],
                    'name' => $validated['name'],
                    'gender' => $validated['gender'],
                    'brand_id' => $validated['brand_id'],
                    'category_id' => $validated['category_id'],
                ]);

                $newPresentation = Presentation::create([
                    'product_id' => $foundProduct->id,
                    'presentation' => $validated['presentation'],
                    'sold_suggest' => $validated['sold_suggest'],
                ]);

                $cleanComponents = [];
                foreach ($validated['components'] as $component) {
                    $cleanComponents[] = [
                        'component_product_id' => $component['component_id'],
                        'material_id' => $component['material_id'],
                        'factor' => $component['factor'],
                        'description' => $component['description'],
                    ];
                }
                // detalles de componentes del producto
                $foundProduct->compositionProducts()->createMany($cleanComponents);
                // detalles de especificacion
                $details = collect($validated['details'])->map(function ($item) {
                    return [
                        'name' => $item['name'],
                        'unit_type_id' => UnitType::where('name', $item['unit_type'])->value('id'),
                        'amount' => $item['amount'],
                    ];
                })->toArray();

                $tags = Tag::whereIn('name', $validated['tags'])
                    ->pluck('id')
                    ->toArray();

                $newPresentation->specifications()->createMany($details);

                $foundProduct->styles()->attach($validated['styles']);

                $newPresentation->tags()->attach($tags);
            });

            return NormalizedResponse::success($data, 'Creado correctamente');
        } catch (\Throwable $th) {
            return NormalizedResponse::error('Errores al crear', $th->getMessage());
        }
    }

    public function show($id)
    {
        return view('products::show');
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
