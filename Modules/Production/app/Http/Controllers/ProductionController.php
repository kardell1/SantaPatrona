<?php

namespace Modules\Production\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function index() {}

    public function store(Request $request) {}

    public function show($id)
    {
        return view("production::show");
    }
    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
