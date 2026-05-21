<?php

namespace Modules\Products\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ComboRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "name" => "required|string|max:255|unique:combos,name",
            "description" => "required|string",
            "status" => "nullable|boolean",

            "products" => "required|array|min:1",

            "products.*.item_id" => "required|integer|exists:menu_product_variants,id",
            "products.*.amount" => "required|integer|min:1",
            "products.*.price" => "required|numeric|min:0",
            "products.*.replaceable" => "required|boolean",

            "products.*.replacement" => "nullable|array",

            "products.*.replacement.*.item_id" => "required|integer|exists:menu_product_variants,id",
            "products.*.replacement.*.amount" => "required|integer|min:1",
            "products.*.replacement.*.price" => "required|numeric|min:0",
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "El nombre es obligatorio.",
            "name.string" => "El nombre debe ser texto.",
            "name.max" => "El nombre no debe superar los 255 caracteres.",
            "name.unique" => "El nombre ya existe.",

            "description.required" => "La descripción es obligatoria.",
            "description.string" => "La descripción debe ser texto.",

            "status.boolean" => "El estado debe ser verdadero o falso.",

            "products.required" => "Debe enviar al menos un producto.",
            "products.array" => "El formato de productos es inválido.",
            "products.min" => "Debe existir al menos un producto.",

            "products.*.item_id.required" => "Debe seleccionar un producto.",
            "products.*.item_id.integer" => "El identificador del producto es inválido.",
            "products.*.item_id.exists" => "El producto seleccionado es inválido.",

            "products.*.amount.required" => "Debe especificar la cantidad.",
            "products.*.amount.integer" => "La cantidad debe ser un número entero.",
            "products.*.amount.min" => "La cantidad mínima es 1.",

            "products.*.price.required" => "Debe especificar el precio.",
            "products.*.price.numeric" => "El precio debe tener un formato válido.",
            "products.*.price.min" => "El precio no puede ser negativo.",

            "products.*.replacement.array" => "El formato de reemplazos es inválido.",

            "products.*.replacement.*.item_id.required" => "Debe seleccionar un producto de reemplazo.",
            "products.*.replacement.*.item_id.integer" => "El identificador del reemplazo es inválido.",
            "products.*.replacement.*.item_id.exists" => "El producto de reemplazo no existe.",

            "products.*.replacement.*.amount.required" => "Debe especificar la cantidad del reemplazo.",
            "products.*.replacement.*.amount.integer" => "La cantidad del reemplazo debe ser un entero.",
            "products.*.replacement.*.amount.min" => "La cantidad mínima del reemplazo es 1.",

            "products.*.replacement.*.price.required" => "Debe especificar el precio del reemplazo.",
            "products.*.replacement.*.price.numeric" => "El precio del reemplazo debe ser numérico.",
            "products.*.replacement.*.price.min" => "El precio del reemplazo no puede ser negativo.",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(

            response()->json([
                'success' => false,
                'message' => 'Errores de validacion',
                'errors' => $validator->errors()
            ], 422)

        );
    }


    public function authorize(): bool
    {
        return true;
    }
}
