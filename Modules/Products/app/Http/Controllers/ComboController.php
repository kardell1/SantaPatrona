<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Modules\Products\Http\Requests\ComboRequest;
use Modules\Products\Models\Combo;

class ComboController extends Controller
{
    public function index()
    {
        $combos = Combo::all();

        return ApiResponse::success($combos, 200);
    }

    public function store(ComboRequest $request)
    {
        // crear los combos
        $validated = $request->validated();

        Combo::create($validated);

        return ApiResponse::success("Combo creado exitosamente", 200);
    }

    public function show($id)
    {
        return view('products::show');
    }


    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
