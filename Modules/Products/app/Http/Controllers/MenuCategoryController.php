<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Modules\Products\Models\MenuCategory;

class MenuCategoryController extends Controller
{
    public function index()
    {
        $data = MenuCategory::all();

        return ApiResponse::success($data, 200);
    }

    public function store(Request $request) {}

    public function show($id)
    {
        return view("products::show");
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
