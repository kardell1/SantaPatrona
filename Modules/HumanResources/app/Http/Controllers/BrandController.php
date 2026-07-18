<?php

namespace Modules\HumanResources\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Supports\NormalizedResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\HumanResources\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $data = Brand::select('id', 'name', 'description')->get();

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
                    'name' => 'required|string|min:2|unique:brands,name',
                    'description' => 'required|string|max:150',
                    'path' => 'nullable|string',
                    'isActive' => 'nullable|boolean',
                    'company_id' => 'required|string|exists:people,id',
                ],
                [
                    'name.required' => 'Es necesario proporcionar un nombre.',
                    'name.string' => 'El nombre debe ser una cadena de texto.',
                    'name.min' => 'El nombre debe tener al menos 2 caracteres.',
                    'name.unique' => 'La marca ya se encuentra registrada.',

                    'description.required' => 'Es necesario proporcionar una descripción.',
                    'description.string' => 'La descripción debe ser una cadena de texto.',
                    'description.max' => 'La descripción no puede superar los 150 caracteres.',
                ]
            );

            $data = DB::transaction(function () use ($validated) {
                return Brand::create($validated);
            });

            return NormalizedResponse::success(
                $data,
                'Marca creada correctamente.'
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

    public function update(Request $request, Brand $brand)
    {
        try {
            $validated = $request->validate(
                [
                    'name' => 'required|string|min:2',
                    'description' => 'required|string|max:150',
                    'path' => 'nullable|string',
                    'isActive' => 'nullable|boolean',
                    'company_id' => 'required|string|exists:people,id',
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

            $exists = Brand::where('name', $validated['name'])
                ->where('id', '!=', $brand->id)
                ->exists();

            if ($exists) {
                return NormalizedResponse::error(
                    null,
                    'La marca ya se encuentra registrada.'
                );
            }

            $data = DB::transaction(function () use ($brand, $validated) {
                $brand->update($validated);

                return $brand->fresh();
            });

            return NormalizedResponse::success(
                $data,
                'Marca actualizada correctamente.'
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
