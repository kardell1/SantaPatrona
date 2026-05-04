<?php

namespace Modules\Production\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Modules\Production\Models\RawProduct;

class RawProductController extends Controller
{
    public function index()
    {
        $data = RawProduct::all();

        return ApiResponse::success($data, 200);
    }
    public function store(Request $request) {}
    public function show($id)
    {
        return view("production::show");
    }
    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
