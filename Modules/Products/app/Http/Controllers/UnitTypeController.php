<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Supports\NormalizedResponse;
use Illuminate\Http\Request;
use Modules\Products\Models\UnitType;

class UnitTypeController extends Controller
{
    public function index()
    {
        $data = UnitType::all();

        return NormalizedResponse::success(
            $data,
            'Consulta exitosa.'
        );
    }

    public function suggestions(string $name)
    {
        try {
            $data = UnitType::query()
                ->where('name', 'ilike', "%{$name}%")
                ->limit(10)
                ->get(['name', 'id', 'acronym']);

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

    public function store(Request $request) {}

    public function show($id)
    {
        return view('products::show');
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
