<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Supports\NormalizedResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Products\Models\Size;

class SizeController extends Controller
{
    public function index()
    {
        $data = Size::select('id', 'size', 'size_system' , 'gender' )->get();

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
                    'name' => 'required|string|min:2|unique:sizes,name',
                    'description' => 'required|string|max:150',
                    'size_system' => 'required|string|in:EU,USA,BR,CHI,PE,BO',
                    'equivalence_id' => 'required|string|unique:sizes,id',
                    'gender' => 'required|string|in:female,male,other'
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
                return Size::create($validated);
            });

            return NormalizedResponse::success(
                $data,
                'Talla creada correctamente.'
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

    public function update(Request $request, Size $size)
    {
        try {

            $validated = $request->validate(
                [
                    'name' => 'required|string|min:2',
                    'description' => 'required|string|max:150',
                    'size_system' => 'required|string|in:EU,USA,BR,CHI,PE,BO',
                    'equivalence_id' => 'required|exists:sizes,id',
                    'gender' => 'required|string|in:female,male,other',
                ],
                [
                    'name.required' => 'Es necesario proporcionar un nombre.',
                    'name.string' => 'El nombre debe ser una cadena de texto.',
                    'name.min' => 'El nombre debe tener al menos 2 caracteres.',

                    'description.required' => 'Es necesario proporcionar una descripción.',
                    'description.string' => 'La descripción debe ser una cadena de texto.',
                    'description.max' => 'La descripción no puede superar los 150 caracteres.',

                    'size_system.required' => 'Es necesario seleccionar un sistema de tallas.',
                    'size_system.string' => 'El sistema de tallas debe ser una cadena de texto.',
                    'size_system.in' => 'El sistema de tallas seleccionado no es válido.',

                    'equivalence_id.required' => 'Es necesario seleccionar una talla equivalente.',
                    'equivalence_id.exists' => 'La talla equivalente seleccionada no existe.',

                    'gender.required' => 'Es necesario seleccionar un género.',
                    'gender.string' => 'El género debe ser una cadena de texto.',
                    'gender.in' => 'El género seleccionado no es válido.',
                ]
            );

            $exists = Size::where('name', $validated['name'])
                ->where('id', '!=', $size->id)
                ->exists();

            if ($exists) {
                return NormalizedResponse::error(
                    null,
                    'La talla ya se encuentra registrada.'
                );
            }

            // Evitar que una talla sea equivalente a sí misma.
            if ((int) $size->id === (int) $validated['equivalence_id']) {
                return NormalizedResponse::error(
                    null,
                    'La equivalencia no puede apuntar a la misma talla.'
                );
            }

            $data = DB::transaction(function () use ($size, $validated) {

                $size->update($validated);

                return $size->fresh();
            });

            return NormalizedResponse::success(
                $data,
                'La talla se actualizó correctamente.'
            );
        } catch (\Exception $e) {

            return NormalizedResponse::error(
                [
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                ],
                'El método ha fallado.'
            );
        }
    }
    public function destroy($id) {}
}
