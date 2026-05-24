<?php

namespace Modules\Sales\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Sales\Http\Requests\SaleStoreRequest;
use Modules\Sales\Models\Sale;
use Modules\Sales\Models\SaleLine;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        // filtrar por mes
        // filtrar por dia
        $month = $request->input('month');
        $day = $request->input('day');

        // sub query
        //$sub = DB::table()

        $query = DB::table('sales as s')
            ->leftJoin('sale_lines as sl', 's.id', '=', 'sl.sale_id')
            ->leftJoin('menu_inventories as mi', 'sl.menu_inventory_id', '=', 'mi.id')
            ->leftJoin('menu_product_variants as mpv', 'mi.menu_product_variant_id', '=', 'mpv.id')
            ->leftJoin('menu_products as mp', 'mpv.menu_product_id', '=', 'mp.id')
            ->leftJoin('menu_categories as mc', 'mp.menu_category_id', '=', 'mc.id')
            ->select(
                's.total_amount',
                's.type_payment',
                's.created_at as date_sold',
                DB::raw("
            json_build_object(
                'id', mi.id,
                'product_name', mp.name,
                'variant', mpv.name,
                'category', mc.name,
                'amount', sl.amount,
                'combo', sl.combo,
                'price', sl.price
            ) as sale_lines
        ")
            )
            ->groupBy(
                's.total_amount',
                's.type_payment',
                's.created_at',
                'mi.id',
                'mp.name',
                'mpv.name',
                'mc.name',
                'sl.amount',
                'sl.combo',
                'sl.price'
            );

        if ($month) {
            $query->whereMonth('s.created_at', $month);
        }

        if ($day) {
            $query->whereDate('s.created_at', $day);
        }

        $historic = $query->get();

        $historic = $historic->map(function ($item) {

            $item->sale_lines = json_decode($item->sale_lines, true);

            return $item;
        });

        return ApiResponse::success(
            //"datos",
            $historic,
            200
        );
    }

    public function store(SaleStoreRequest $request)
    {
        try {
            $validated = $request->validated();

            $newSale = Sale::create([
                'client_id' => $validated['client_id'],
                'employee_id' => $validated['employee_id'],
                'total_amount' => $validated['total'],
                'type_payment' => $validated['type_payment'],
            ]);

            // agregar los productos
            $items_sold = [];

            foreach ($validated['details'] as $item) {
                // verificar que tenemos stock para realizar la venta
                $line = SaleLine::create([
                    'sale_id' =>  $newSale->id,
                    'menu_inventory_id' => $item['product_variant_id'],
                    'combo' =>  $item['combo'],
                    // el amount representa la unidad unitaria , basado en eso vendemos
                    'amount' =>  $item['amount'],
                    'price' => $item['price']
                ]);
                // si tiene recipe con un elemento agregamos , sino saltamos
                $items_sold[$item['product_variant_id']] = $item['amount'];
            }

            foreach ($items_sold as $inventoryId => $item) {
                DB::table('menu_inventories')->where('id', '=', $inventoryId)->decrement('amount', $item);
            }
            return ApiResponse::success(
                "Venta realizada existosamente.",
                201
            );
        } catch (\Throwable $e) {

            return ApiResponse::error(
                $e->getMessage(),
                500,
                "Error interno del servidor",
            );
        }
    }

    public function show($id)
    {
        return view('sales::show');
    }
}
