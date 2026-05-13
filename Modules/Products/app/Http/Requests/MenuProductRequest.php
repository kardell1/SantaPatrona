<?php

namespace Modules\Products\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "name" => "required|string|min:5",
            "is_priority" => "required|boolean",
            // precio de venta
            "suggested_selling_price" => "required|regex:/^\d+(\.\d{1,2})?$/",
            // costo de producción
            "manufacturing_cost" => "required|regex:/^\d+(\.\d{1,2})?$/",
            // fecha de adquisicion
            "adquisition_date" => "required|date",
            // fecha de recepcion
            "reception_date" => "required|date",
            // fecha de expiracion
            "expired_date" => "required|date",
            // seleccion de la categoria
            "menu_category_id" => "required|exists:menu_categories,id"
        ];
    }

    public function messages(): array
    {
        return [
            // name
            "name.required" => "El nombre es obligatorio.",
            "name.string" => "El nombre debe ser un texto válido.",
            "name.min" => "El nombre debe tener al menos 5 caracteres.",
            // is_priority
            "is_priority.required" => "Debe indicar si es prioritario.",
            "is_priority.boolean" =>
                "El campo prioridad debe ser verdadero o falso.",
            // suggested_selling_price
            "suggested_selling_price.required" =>
                "El precio de venta es obligatorio.",
            "suggested_selling_price.regex" =>
                "El precio de venta debe contener solo números y un máximo de 2 decimales.",
            // manufacturing_cost
            "manufacturing_cost.required" =>
                "El costo de producción es obligatorio.",
            "manufacturing_cost.regex" =>
                "El costo de producción debe contener solo números y un máximo de 2 decimales.",
            // adquisition_date
            "adquisition_date.required" =>
                "La fecha de adquisición es obligatoria.",
            "adquisition_date.date" =>
                "La fecha de adquisición no tiene un formato válido.",
            // reception_date
            "reception_date.required" =>
                "La fecha de recepción es obligatoria.",
            "reception_date.date" =>
                "La fecha de recepción no tiene un formato válido.",
            // expired_date
            "expired_date.required" => "La fecha de expiración es obligatoria.",
            "expired_date.date" =>
                "La fecha de expiración no tiene un formato válido.",
            // menu_category_id
            "menu_category_id.required" => "Debe seleccionar una categoría.",
            "menu_category_id.exists" => "La categoría seleccionada no existe.",
        ];
    }
    public function authorize(): bool
    {
        return true;
    }
}
