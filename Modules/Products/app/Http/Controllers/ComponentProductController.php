<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Supports\NormalizedResponse;
use Illuminate\Http\Request;
use Modules\Products\Models\ComponentProduct;

class ComponentProductController extends Controller
{
    // si mandamos : un array , donde category : complemento
    public function index()
    {
        $components = ComponentProduct::get(['id', 'name']);

        return NormalizedResponse::success(
            $components,
            'Consulta al metodo index exitosa en component product.'
        );
    }

    public function store(Request $request) {}

    public function show($id)
    {
        return NormalizedResponse::success(
            $data,
            'Consulta exitosa.'
        );
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
