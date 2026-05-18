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
            "name" => "required|string|min:3|max:255",
            "menu_category_id" => "required|integer|exists:menu_categories,id",
            //

            /*
        |--------------------------------------------------------------------------
        | Presentations / Variants
        |--------------------------------------------------------------------------
        */

            "presentation" => "required|array|min:1",
            "presentation.*.name" => "required|string|min:1|max:100",
            // cantidad total de divisiones del producto
            // ejemplo:
            // grande -> 8
            // pequeña -> 4
            "presentation.*.equivalence" => "required|integer|min:1",
            /*
        |--------------------------------------------------------------------------
        | Portions
        |--------------------------------------------------------------------------
        */
            "presentation.*.portions" => "required|array|min:1",
            "presentation.*.portions.*.name"
            => "required|string|min:1|max:100",

            "presentation.*.portions.*.combo_id" => "nullable|integer|exists:combos,id",

            "presentation.*.portions.*.price"
            => "required|numeric|min:0",
            // cuantas divisiones consume esta porcion
            // ejemplo:
            // entera -> 8
            // mitad -> 4
            // rodaja -> 1
            "presentation.*.portions.*.divisions"
            => "required|integer|min:1",
            /*
        |--------------------------------------------------------------------------
        | Extras
        |--------------------------------------------------------------------------
        */
            "extras" => "nullable|array",
            "extras.*.raw_product_id"
            => "required|integer|exists:raw_products,id",
            "extras.*.price"
            => "required|numeric|min:0",
            "extras.*.detail"
            => "nullable|string|max:250",
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
