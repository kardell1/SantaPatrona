<?php

namespace Modules\Sales\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Products\Models\Combo;
use Modules\Sales\Http\Requests\SaleRequest;
use Modules\Sales\Models\Sale;
use Modules\Sales\Models\SaleLine;
use Modules\Sales\Models\SaleLineDetail;

class SaleController extends Controller
{
    public function index()
    {
        $historic = Sale::with('client' , 'employee' , 'saleLines.menuProduct')->get();

        // consulta para recuperar las ventas realizadas , cliente , empleado , y lo que se vendio
        return ApiResponse::success(
            $historic,
            201
        );
    }




    public function store(SaleRequest $request)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validated();

            $sale = Sale::create([
                'employee_id' => 1, // esto cambia cuando tengamos el token */
                'client_id' => $validated['client_id'],
                'total_amount' => $validated['total_amount'],
                'type_payment' => $validated['type_payment'],
            ]);

            foreach ($validated['items'] as $item) {
                if ($item['is_combo'] === true) {

                    $combo = Combo::with('menuProducts')
                        ->findOrFail($item['combo_id']);

                    foreach ($combo->menuProducts as $product) {
                        SaleLine::create([
                            'sale_id' => $sale->id,
                            'menu_product_id' => $product->id,
                            'combo' => $combo->name,
                            'price' =>$product->suggested_selling_price ?? 0 ,
                            'is_combo' => true,
                        ]);
                    }

                    continue;
                }

                if (!empty($item['products'])) {

                    foreach ($item['products'] as $product) {

                        $saleDetail = SaleLine::create([
                            'sale_id' => $sale->id,
                            'menu_product_id' => $product['product_id'],
                            'price' => $product['price'],
                            'is_combo' => false,
                        ]);

                        if (!empty($product['detail'])) {

                            foreach ($product['detail'] as $detail) {

                                SaleLineDetail::create([
                                    'sale_line_id' => $saleDetail->id,
                                    'raw_product_id' => $detail['raw_product'],
                                    'action' => $detail['action'],
                                ]);
                            }
                        }
                    }
                }
            }

            DB::commit();

            return ApiResponse::success(
                "venta registrada exitosamente.",
                201
            );
        } catch (\Throwable $th) {

            DB::rollBack();

            return ApiResponse::error(
                'Error al registrar la venta',
                500,
                $th->getMessage()
            );
        }
    }
    public function show($id)
    {
        return view('sales::show');
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
