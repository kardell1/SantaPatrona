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
            // adicionalmente podemos enviar la cantidad , y el producto
            "amount" => "required|numeric",
            "products" => "required|array",
            "products.*.item_id" => "integer|exists:menu_products,id"
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "El nombre es obligatorio.",
            "name.string" => "El nombre debe ser texto.",
            "name.max" => "El nombre no debe superar los 255 caracteres.",
            "name.unique" => "El nombre ya existe.",

            "description.required" => "La descripcion es obligatoria.",
            "description.string" => "La descripcion debe ser texto.",

            "status.boolean" => "El estado debe ser verdadero o falso.",
            "amount.required" => "Es necesario especificar el costo de venta de este combo.",
            "amount.numeric" => "Debe ingresar un precio de venta con formato valido.",
            "products" => "Es necesario enviar el array",
            "products.*.item_id.exists" => "El producto seleccionado es invalido"
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
