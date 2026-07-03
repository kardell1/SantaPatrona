<?php

namespace Modules\HumanResources\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Supports\NormalizedResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\HumanResources\Models\Position;

class PositionController extends Controller
{
    // salario , empleados en ese rol ,estado , descripcion , nombre ,
    public function index()
    {
        $data = Position::select('id', 'name', 'description', 'suggest_salary')
            ->withCount('employees')
            ->get();

        return NormalizedResponse::success(
            $data,
            'Consulta exitosa.'
        );
    }

    // crear nuevo cargo , descripcion , salario base para ese cargo , horario de trabajo si aplicara
    public function store(Request $request)
    {
        try {
            $validated = $request->validate(
                [
                    'name' => 'required|string|min:2|unique:positions,name',
                    'description' => 'required|string|max:150',
                    'suggest_salary' => 'nullable|numeric|min:0',
                ],
                [
                    'name.required' => 'Es necesario proporcionar un nombre.',
                    'name.string' => 'El nombre debe ser una cadena de texto.',
                    'name.min' => 'El nombre debe tener al menos 2 caracteres.',
                    'name.unique' => 'El cargo ya se encuentra registrado.',

                    'description.required' => 'Es necesario proporcionar una descripción.',
                    'description.string' => 'La descripción debe ser una cadena de texto.',
                    'description.max' => 'La descripción no puede superar los 150 caracteres.',

                    'suggest_salary.numeric' => 'El salario sugerido debe ser un valor numérico.',
                    'suggest_salary.min' => 'El salario sugerido no puede ser menor a 0.',
                ]
            );

            $data = DB::transaction(function () use ($validated) {

                return Position::create($validated);
            });

            return NormalizedResponse::success(
                $data,
                'Cargo creado correctamente.'
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
    // ver el cargo , cuantas personas estan en eso , quiza la lista de personas
    // el estado, vigencia desde que epoca ,
    public function show($id)
    {
        return view('humanresources::show');
    }

    public function update(Request $request, Position $position)
    {
        try {

            $validated = $request->validate(
                [
                    'name' => 'required|string|min:2',
                    'description' => 'required|string|max:150',
                    'suggest_salary' => 'nullable|numeric|min:0',
                ],
                [
                    'name.required' => 'Es necesario proporcionar un nombre.',
                    'name.string' => 'El nombre debe ser una cadena de texto.',
                    'name.min' => 'El nombre debe tener al menos 2 caracteres.',

                    'description.required' => 'Es necesario proporcionar una descripción.',
                    'description.string' => 'La descripción debe ser una cadena de texto.',
                    'description.max' => 'La descripción no puede superar los 150 caracteres.',

                    'suggest_salary.numeric' => 'El salario sugerido debe ser un valor numérico.',
                    'suggest_salary.min' => 'El salario sugerido no puede ser menor a 0.',
                ]
            );

            $exists = Position::where('name', $validated['name'])
                ->where('id', '!=', $position->id)
                ->exists();

            if ($exists) {
                return NormalizedResponse::error(
                    null,
                    'El cargo ya se encuentra registrado.'
                );
            }

            $data = DB::transaction(function () use ($position, $validated) {

                $position->update($validated);

                return $position->fresh();
            });

            return NormalizedResponse::success(
                $data,
                'Cargo actualizado correctamente.'
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

    // eliminar es soft deletes
    public function destroy($id) {}
}
