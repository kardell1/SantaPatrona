<?php

namespace App\Http\Controllers;

use App\Http\Supports\NormalizedResponse;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::select('id', 'name')->get();

        return NormalizedResponse::success($branches, 'Consulta exitosa.');
    }

    // creamos la sucursal con datos como ,
    // nombre , direccion , numero , departamento
    public function store(Request $request)
    {
        try {
            $validated = $request->validate(
                [
                    'name' => 'required|string|max:100|unique:roles,name',
                    'direction' => 'required|string',
                ],
                [
                    'name.required' => 'Es necesario enviar un nombre para crear el nuevo rol.',
                    'name.string'   => 'El nombre debe ser una cadena de texto.',
                    'name.max'      => 'El nombre no puede superar los 100 caracteres.',
                    'name.unique'   => 'Ya existe un rol con ese nombre.',
                    'direction.required' => 'Es necesario agregar una descripcion.'
                ]
            );

            $data =  DB::transaction(function () use ($validated) {
                return Branch::create([
                    'code' => null,
                    'name' => $validated['name'],
                    'direction' => $validated['direction']
                ]);
            });

            return NormalizedResponse::success($data, 'Creado correctamente');
        } catch (\Throwable $th) {

            return NormalizedResponse::error("Errores al crear", $th->getMessage());
        }
    }

    public function update(Request $request, Branch $branch)
    {
        try {

            $validated = $request->validate(
                [
                    'name' => 'required|string|max:100',
                    'direction' => 'required|string',
                ],
                [
                    'name.required' => 'Es necesario enviar un nombre para la sucursal.',
                    'name.string'   => 'El nombre debe ser una cadena de texto.',
                    'name.max'      => 'El nombre no puede superar los 100 caracteres.',
                    'direction.required' => 'Es necesario agregar una dirección.'
                ]
            );

            $exists = Branch::where('name', $validated['name'])
                ->where('id', '!=', $branch->id)
                ->exists();

            if ($exists) {
                return NormalizedResponse::error(
                    null,
                    'Ya existe otra sucursal con ese nombre.'
                );
            }

            $data = DB::transaction(function () use ($branch, $validated) {

                $branch->update([
                    'name' => $validated['name'],
                    'direction' => $validated['direction']
                ]);

                return $branch->fresh();
            });

            return NormalizedResponse::success(
                $data,
                'Actualizado correctamente.'
            );
        } catch (\Throwable $th) {

            return NormalizedResponse::error(
                'Errores al actualizar',
                $th->getMessage()
            );
        }
    }

    public function show(Branch $branch)
    {
        try {

            return NormalizedResponse::success(
                $branch,
                'Consulta exitosa.'
            );
        } catch (\Throwable $th) {

            return NormalizedResponse::error(
                'Errores al consultar',
                $th->getMessage()
            );
        }
    }
}
