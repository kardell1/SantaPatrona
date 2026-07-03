<?php

namespace Modules\IAM\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Supports\NormalizedResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\IAM\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::select('name', 'id')->get();
        return NormalizedResponse::success($roles, 'Consulta exitosa.');
    }
    public function store(Request $request)
    {
        try {

            $validated = $request->validate(
                [
                    'name' => 'required|string|max:100|unique:roles,name',
                    'description' => 'required|string',
                ],
                [
                    'name.required' => 'Es necesario enviar un nombre para crear el nuevo rol.',
                    'name.string'   => 'El nombre debe ser una cadena de texto.',
                    'name.max'      => 'El nombre no puede superar los 100 caracteres.',
                    'name.unique'   => 'Ya existe un rol con ese nombre.',
                    'description.required' => 'Es necesario agregar una descripcion.'
                ]
            );

            $role = DB::transaction(function () use ($validated) {
                return Role::create($validated);
            });


            return NormalizedResponse::success($role, 'Creado correctamente.');
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

    public function show(int $id)
    {

        $foundRole = Role::select('id', 'name')
            ->with(['permissions:id'])
            ->where('id', $id)
            ->first();

        return NormalizedResponse::success($foundRole, 'Creado correctamente.');
    }

    public function update(Request $request, Role $role)
    {
        try {

            $validated = $request->validate(
                [
                    'name' => 'required|string|max:100',
                    'description' => 'required|string',
                    'permissions' => 'array',
                    'permissions.*' => 'integer'
                ],
                [
                    'name.required' => 'Es necesario enviar un nombre para crear el nuevo rol.',
                    'name.string' => 'El nombre debe ser una cadena de texto.',
                    'name.max' => 'El nombre no puede superar los 100 caracteres.',
                    'description.required' => 'Es necesario agregar una descripcion.',
                    'permissions.array' => 'El formato de permisos es inválido.',
                    'permissions.*.integer' => 'Todos los permisos deben ser identificadores numéricos.',
                ]
            );

            $exists = Role::where('name', $validated['name'])
                ->where('id', '!=', $role->id)
                ->exists();

            if ($exists) {
                return NormalizedResponse::error(
                    null,
                    'Ya existe otro rol con ese nombre.'
                );
            }

            DB::transaction(function () use ($role, $validated) {

                $role->update([
                    'name' => $validated['name'],
                    'description' => $validated['description'],
                ]);

                $role->permissions()->attach(
                    $validated['permissions'] ?? []
                );
            });

            return NormalizedResponse::success(
                [],
                'Actualizado correctamente.'
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
}
