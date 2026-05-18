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

            //            "presentation.*.portions.*.combo_id" => "nullable|integer|exists:combos,id",

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

            /*
        |--------------------------------------------------------------------------
        | PRODUCTO
        |--------------------------------------------------------------------------
        */

            "name.required"
            => "El nombre del producto es obligatorio.",

            "name.string"
            => "El nombre del producto debe ser texto.",

            "name.min"
            => "El nombre del producto debe tener al menos 3 caracteres.",

            "name.max"
            => "El nombre del producto no puede superar los 255 caracteres.",

            "menu_category_id.required"
            => "La categoría es obligatoria.",

            "menu_category_id.integer"
            => "La categoría debe ser válida.",

            "menu_category_id.exists"
            => "La categoría seleccionada no existe.",

            /*
        |--------------------------------------------------------------------------
        | PRESENTATIONS / VARIANTS
        |--------------------------------------------------------------------------
        */

            "presentation.required"
            => "Debe registrar al menos una presentación.",

            "presentation.array"
            => "Las presentaciones deben enviarse como arreglo.",

            "presentation.min"
            => "Debe registrar al menos una presentación.",

            "presentation.*.name.required"
            => "El nombre de la presentación es obligatorio.",

            "presentation.*.name.string"
            => "El nombre de la presentación debe ser texto.",

            "presentation.*.name.min"
            => "El nombre de la presentación debe tener al menos 1 carácter.",

            "presentation.*.name.max"
            => "El nombre de la presentación no puede superar los 100 caracteres.",

            "presentation.*.equivalence.required"
            => "La equivalencia de la presentación es obligatoria.",

            "presentation.*.equivalence.integer"
            => "La equivalencia debe ser un número entero.",

            "presentation.*.equivalence.min"
            => "La equivalencia debe ser al menos 1.",

            /*
        |--------------------------------------------------------------------------
        | PORTIONS
        |--------------------------------------------------------------------------
        */

            "presentation.*.portions.required"
            => "Debe registrar al menos una porción.",

            "presentation.*.portions.array"
            => "Las porciones deben enviarse como arreglo.",

            "presentation.*.portions.min"
            => "Debe registrar al menos una porción.",

            "presentation.*.portions.*.name.required"
            => "El nombre de la porción es obligatorio.",

            "presentation.*.portions.*.name.string"
            => "El nombre de la porción debe ser texto.",

            "presentation.*.portions.*.name.min"
            => "El nombre de la porción debe tener al menos 1 carácter.",

            "presentation.*.portions.*.name.max"
            => "El nombre de la porción no puede superar los 100 caracteres.",

            "presentation.*.portions.*.price.required"
            => "El precio de la porción es obligatorio.",

            "presentation.*.portions.*.price.numeric"
            => "El precio de la porción debe ser numérico.",

            "presentation.*.portions.*.price.min"
            => "El precio de la porción no puede ser negativo.",

            "presentation.*.portions.*.divisions.required"
            => "La división consumida es obligatoria.",

            "presentation.*.portions.*.divisions.integer"
            => "La división consumida debe ser un número entero.",

            "presentation.*.portions.*.divisions.min"
            => "La división consumida debe ser al menos 1.",

            /*
        |--------------------------------------------------------------------------
        | EXTRAS
        |--------------------------------------------------------------------------
        */

            "extras.array"
            => "Los extras deben enviarse como arreglo.",

            "extras.*.raw_product_id.required"
            => "El producto base del extra es obligatorio.",

            "extras.*.raw_product_id.integer"
            => "El producto base del extra debe ser válido.",

            "extras.*.raw_product_id.exists"
            => "El producto base seleccionado no existe.",

            "extras.*.price.required"
            => "El precio del extra es obligatorio.",

            "extras.*.price.numeric"
            => "El precio del extra debe ser numérico.",

            "extras.*.price.min"
            => "El precio del extra no puede ser negativo.",

            "extras.*.detail.string"
            => "El detalle del extra debe ser texto.",

            "extras.*.detail.max"
            => "El detalle del extra no puede superar los 250 caracteres.",
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
