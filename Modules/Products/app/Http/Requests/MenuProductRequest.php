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
            "extras" => "required|array",
            "extras.*.raw_product_id" => "exists:raw_products,id",
            "extras.*.price" => "numeric|min:0",
            "extras.*.detail" => "string|max:250",
        ];
    }


    public function messages(): array
    {
        return [

            // PRODUCTO
            "name.required" => "El nombre del producto es obligatorio.",
            "name.string" => "El nombre debe ser texto.",
            "name.min" => "El nombre debe tener al menos 5 caracteres.",

            "menu_category_id.required" => "La categoría es obligatoria.",
            "menu_category_id.exists" => "La categoría seleccionada no existe.",

            "combo_id.exists" => "El combo seleccionado no existe.",

            // PRESENTACIONES
            "presentation.required" => "Debe existir al menos una presentación.",
            "presentation.array" => "Las presentaciones deben enviarse como arreglo.",
            "presentation.min" => "Debe existir al menos una presentación.",

            "presentation.*.name.required" => "El nombre de la presentación es obligatorio.",
            "presentation.*.name.string" => "El nombre de la presentación debe ser texto.",

            "presentation.*.equivalence.required" => "La equivalencia es obligatoria.",
            "presentation.*.equivalence.string" => "La equivalencia debe ser texto.",

            "presentation.*.price.required" => "El precio es obligatorio.",
            "presentation.*.price.numeric" => "El precio debe ser numérico.",
            "presentation.*.price.min" => "El precio no puede ser negativo.",

            // EXTRAS
            "extras.required" => "Los extras son obligatorios.",
            "extras.array" => "Los extras deben enviarse como arreglo.",

            "extras.*.raw_product_id.exists" => "El producto base seleccionado no existe.",

            "extras.*.price.numeric" => "El precio del extra debe ser numérico.",
            "extras.*.price.min" => "El precio del extra no puede ser negativo.",

            "extras.*.detail.string" => "El detalle del extra debe ser texto.",
            "extras.*.detail.max" => "El detalle del extra no puede superar los 250 caracteres.",
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
