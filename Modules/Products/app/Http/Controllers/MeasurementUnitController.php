<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeasurementUnitController extends Controller
{
    public function index()
    {
        return view('products::index');
    }

    public function store(Request $request) {}

    public function show($id)
    {
        return view('products::show');
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
