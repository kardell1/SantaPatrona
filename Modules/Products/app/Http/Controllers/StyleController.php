<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Supports\NormalizedResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Products\Models\Style;

class StyleController extends Controller
{
    public function index()
    {
        $data = Style::select('id', 'name', 'description')->get();

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
                    'name' => 'required|string|min:2|unique:styles,name',
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
                return Style::create($validated);
            });

            return NormalizedResponse::success(
                $data,
                'Estilo creado correctamente.'
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

    public function update(Request $request, Style $style)
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

            $exists = Style::where('name', $validated['name'])
                ->where('id', '!=', $style->id)
                ->exists();

            if ($exists) {
                return NormalizedResponse::error(
                    null,
                    'El estilo ya se encuentria registrado.'
                );
            }

            $data = DB::transaction(function () use ($style, $validated) {

                $style->update($validated);

                return $style->fresh();
            });

            return NormalizedResponse::success(
                $data,
                'Estilo actualizado correctamente.'
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
