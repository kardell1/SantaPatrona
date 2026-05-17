<?php

namespace Modules\Products\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MenuProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "name" => "required|string|min:5",
            "menu_category_id" => "required|exists:menu_categories,id",
            "combo_id" => "nullable|exists:combos,id",
            "presentation" => "required|array|min:1",
            "presentation.*.name" => "required|string", // nombre representa el nombre comercial
            "presentation.*.equivalence" => "required|string", // representa cuanto del producto total representa
            "presentation.*.price" => "required|numeric|min:0", // el costo de esa porcion
        ];
    }

    public function messages(): array
    {
        return [

            "name.required" => "El nombre del producto es obligatorio.",
            "name.string" => "El nombre debe ser texto.",
            "name.min" => "El nombre debe tener al menos 3 caracteres.",

            "menu_category_id.required" => "La categoría es obligatoria.",
            "menu_category_id.exists" => "La categoría seleccionada no existe.",

            "combo_id.exists" => "El combo seleccionado no existe.",

            "presentation.required" => "Debe existir al menos una presentación.",
            "presentation.array" => "Las presentaciones deben enviarse como arreglo.",
            "presentation.min" => "Debe existir al menos una presentación.",

            "presentation.*.name.required" => "El nombre de la presentación es obligatorio.",

            "presentation.*.equivalence.required" => "La equivalencia es obligatoria.",

            "presentation.*.price.required" => "El precio es obligatorio.",
            "presentation.*.price.numeric" => "El precio debe ser numérico.",
            "presentation.*.price.min" => "El precio no puede ser negativo.",
        ];
    }

    /**
     * Captura y personaliza errores de validación.
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                "success" => false,
                "message" => "Errores de validación.",
                "errors" => $validator->errors(),
            ], 422)
        );
    }



    public function authorize(): bool
    {
        return true;
    }
}
