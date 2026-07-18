<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Supports\NormalizedResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Products\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        $data = Color::select('id', 'name', 'description')->get();

        return NormalizedResponse::success(
            $data,
            'Consulta exitosa.'
        );
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate(
                [
                    'name' => 'required|string|min:2|unique:colors,name',
                    'description' => 'required|string|max:150',
                ],
                [
                    'name.required' => 'Es necesario proporcionar un nombre.',
                    'name.string' => 'El nombre debe ser una cadena de texto.',
                    'name.min' => 'El nombre debe tener al menos 2 caracteres.',
                    'name.unique' => 'La categoria ya se encuentra registrada.',

                    'description.required' => 'Es necesario proporcionar una descripción.',
                    'description.string' => 'La descripción debe ser una cadena de texto.',
                    'description.max' => 'La descripción no puede superar los 150 caracteres.',

                ]
            );

            $data = DB::transaction(function () use ($validated) {
                return Color::create($validated);
            });

            return NormalizedResponse::success(
                $data,
                'Color creado correctamente.'
            );
        } catch (\Exception $e) {

            return NormalizedResponse::error(
                [
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                ],
                'Metodo ha fallado'
            );
        }
    }

    public function show($id) {}

    public function update(Request $request, Color $color)
    {
        try {

            $validated = $request->validate(
                [
                    'name' => 'required|string|min:2',
                    'description' => 'required|string|max:150',
                ],
                [
                    'name.required' => 'Es necesario proporcionar un nombre.',
                    'name.string' => 'El nombre debe ser una cadena de texto.',
                    'name.min' => 'El nombre debe tener al menos 2 caracteres.',

                    'description.required' => 'Es necesario proporcionar una descripción.',
                    'description.string' => 'La descripción debe ser una cadena de texto.',
                    'description.max' => 'La descripción no puede superar los 150 caracteres.',
                ]
            );

            $exists = Color::where('name', $validated['name'])
                ->where('id', '!=', $color->id)
                ->exists();

            if ($exists) {
                return NormalizedResponse::error(
                    null,
                    'El color ya se encuentria registrado.'
                );
            }

            $data = DB::transaction(function () use ($color, $validated) {

                $color->update($validated);

                return $color->fresh();
            });

            return NormalizedResponse::success(
                $data,
                'Color se actualizo correctamente.'
            );
        } catch (\Exception $e) {

            return NormalizedResponse::error(
                [
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                ],
                'Metodo ha fallado'
            );
        }
    }

    public function destroy($id) {}
}
