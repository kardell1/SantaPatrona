<?php

namespace Modules\Sales\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SaleStoreRequest extends FormRequest
{
     protected $stopOnFirstFailure = true;
// no necesitamos el valor de has_combo , ya que si el combo viene como nullo , no es necesario saber eso
    public function rules(): array
    {
        return [
            "employee_id" => "required|integer|exists:employees,id",
            "client_id" => "required|integer|exists:people,id",
            "total" => "required|numeric|min:0",
            "disccount" => "required|numeric|min:0",
            "date" => "required|date",
            "type_payment" => "required|in:internal,delivery,event",
            "details" => "required|array|min:1",
            "details.*.product_variant_id" => "required|integer|exists:menu_product_variants,id",
            "details.*.type_product" => "required|in:simple,recipe",
            "details.*.amount" => "required|integer|min:0",
            "details.*.price" => "required|numeric|min:0",
            "details.*.has_combo" => "required|bool",
            "details.*.combo" => "nullable|string|exists:combos,id",
            "details.*.recipe" => "nullable|array",
            "details.*.recipe.*.raw_product_id" => "required|exists:raw_products,id",
            "details.*.recipe.*.details" => "required|string|max:150",
            "details.*.recipe.*.price" => "required|numeric|min:0",
            "details.*.recipe.*.amount" => "required|integer|min:0",
            "details.*.recipe.*.operation" => "required|in:debit,credit",
        ];
    }

    public function messages(): array
    {
        return [

            "type_payment.required" => "es necesario agregar el tipo de venta",
            "type_payment.in" => "es necesario seleccionar el tipo de venta",
            // Venta
            'employee_id.required' => 'El empleado es obligatorio.',
            'employee_id.integer' => 'El empleado debe ser un número válido.',
            'employee_id.exists' => 'El empleado seleccionado no existe.',

            'client_id.required' => 'El cliente es obligatorio.',
            'client_id.integer' => 'El cliente debe ser un número válido.',
            'client_id.exists' => 'El cliente seleccionado no existe.',

            'total.required' => 'El total es obligatorio.',
            'total.numeric' => 'El total debe ser numérico.',
            'total.min' => 'El total no puede ser negativo.',

            'disccount.required' => 'El descuento es obligatorio.',
            'disccount.numeric' => 'El descuento debe ser numérico.',
            'disccount.min' => 'El descuento no puede ser negativo.',

            'date.required' => 'La fecha es obligatoria.',
            'date.date' => 'La fecha no tiene un formato válido.',

            // Detalles
            'details.required' => 'Debe agregar al menos un detalle.',
            'details.array' => 'Los detalles deben enviarse como una lista.',
            'details.min' => 'Debe agregar al menos un producto.',

            // Producto
            'details.*.product_variant_id.required' => 'La variante del producto es obligatoria.',
            'details.*.product_variant_id.integer' => 'La variante del producto debe ser un número válido.',
            'details.*.product_variant_id.exists' => 'La variante del producto no existe.',

            'details.*.type_product.required' => 'El tipo de producto es obligatorio.',
            'details.*.type_product.in' => 'El tipo de producto debe ser simple o recipe.',

            'details.*.amount.required' => 'La cantidad es obligatoria.',
            'details.*.amount.integer' => 'La cantidad debe ser un número entero.',
            'details.*.amount.min' => 'La cantidad no puede ser negativa.',

            'details.*.price.required' => 'El precio es obligatorio.',
            'details.*.price.numeric' => 'El precio debe ser numérico.',
            'details.*.price.min' => 'El precio no puede ser negativo.',

            'details.*.has_combo.required' => 'Debe indicar si el producto tiene combo.',
            'details.*.has_combo.bool' => 'El campo combo debe ser verdadero o falso.',

            'details.*.combo.string' => 'El combo debe ser un texto válido.',
            'details.*.combo.exists' => 'El combo seleccionado no existe.',

            // Recetas
            'details.*.recipe.required' => 'La receta es obligatoria.',
            'details.*.recipe.array' => 'La receta debe enviarse como una lista.',

            'details.*.recipe.*.raw_product_id.required' => 'La materia prima es obligatoria.',
            'details.*.recipe.*.raw_product_id.exists' => 'La materia prima seleccionada no existe.',

            'details.*.recipe.*.details.required' => 'El detalle de la receta es obligatorio.',
            'details.*.recipe.*.details.string' => 'El detalle de la receta debe ser texto.',
            'details.*.recipe.*.details.max' => 'El detalle de la receta no puede superar los 150 caracteres.',

            'details.*.recipe.*.price.required' => 'El precio de la receta es obligatorio.',
            'details.*.recipe.*.price.numeric' => 'El precio de la receta debe ser numérico.',
            'details.*.recipe.*.price.min' => 'El precio de la receta no puede ser negativo.',

            'details.*.recipe.*.amount.required' => 'La cantidad de la receta es obligatoria.',
            'details.*.recipe.*.amount.integer' => 'La cantidad de la receta debe ser un número entero.',
            'details.*.recipe.*.amount.min' => 'La cantidad de la receta no puede ser negativa.',

            'details.*.recipe.*.operation.required' => 'La operación es obligatoria.',
            'details.*.recipe.*.operation.in' => 'La operación debe ser debit o credit.',
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
