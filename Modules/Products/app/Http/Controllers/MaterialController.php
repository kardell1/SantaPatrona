<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Supports\NormalizedResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Products\Models\Material;

class MaterialController extends Controller
{
    public function index()
    {
        $data = Material::select('id', 'name', 'description')->get();

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
                    'name' => 'required|string|min:2|unique:materials,name',
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
                return Material::create($validated);
            });

            return NormalizedResponse::success(
                $data,
                'Material creado correctamente.'
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

    public function update(Request $request, Material $material)
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

            $exists = Material::where('name', $validated['name'])
                ->where('id', '!=', $material->id)
                ->exists();

            if ($exists) {
                return NormalizedResponse::error(
                    null,
                    'El material ya se encuentria registrado.'
                );
            }

            $data = DB::transaction(function () use ($material, $validated) {

                $material->update($validated);

                return $material->fresh();
            });

            return NormalizedResponse::success(
                $data,
                'Material actualizado correctamente.'
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
