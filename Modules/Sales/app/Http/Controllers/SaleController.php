<?php

namespace Modules\Sales\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        //
    }

    // necesitamos saber que item del inventario se esta vendiendo
    // neceistamos saber si pertenece a un combo esa venta
    // la cantidad vendida de ese producto
    // y el costo de venta
    //
    // el fronted ve los combos y las variantes del producto , al final nos mandan los productos consumidos
    //
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('sales::show');
    }




}
