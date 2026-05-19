<?php

namespace Modules\Products\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MenuInventoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "product_variant_id" => "required|integer|exists:menu_product_variants,id",
            "manufacturing_cost" => "required|numeric|min:0",
            "amount" => "required|integer|min:1",
            "reception_date" => "required|date",
            "expired_date" => "required|date",
            "flavor_id" => "nullable|exists:menu_flavors,id"
        ];
    }

    public function messages(): array
    {
        return [

            // product_variant_id
            "product_variant_id.required" => "La variante del producto es obligatoria.",
            "product_variant_id.integer" => "La variante del producto debe ser un número válido.",
            "product_variant_id.exists" => "La variante seleccionada no existe.",

            // manufacturing_cost
            "manufacturing_cost.required" => "El costo de producción es obligatorio.",
            "manufacturing_cost.numeric" => "El costo de producción debe ser numérico.",
            "manufacturing_cost.min" => "El costo de producción no puede ser negativo.",

            // amount
            "amount.required" => "La cantidad es obligatoria.",
            "amount.integer" => "La cantidad debe ser un número entero.",
            "amount.min" => "La cantidad mínima permitida es 1.",

            // reception_date
            "reception_date.required" => "La fecha de recepción es obligatoria.",
            "reception_date.date" => "La fecha de recepción no tiene un formato válido.",

            // expired_date
            "expired_date.required" => "La fecha de vencimiento es obligatoria.",
            "expired_date.date" => "La fecha de vencimiento no tiene un formato válido.",
            "expired_date.after" => "La fecha de vencimiento debe ser posterior a la fecha de recepción.",

            // flavor_id
            "flavor_id.integer" => "El sabor debe ser un número válido.",
            "flavor_id.exists" => "El sabor seleccionado no existe.",
        ];
    }
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
