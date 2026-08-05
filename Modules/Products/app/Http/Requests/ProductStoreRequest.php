<?php

namespace Modules\Products\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function rules(): array
    {
        // nunit type es de tipo name
        // tags de formato name
        // styles es de tipo name
        return [
            // informacion general
            'name' => 'required|string|max:50',
            'presentation' => 'nullable|string|min:2|max:100',
            'category_id' => 'required|integer|exists:categories,id',
            'brand_id' => 'required|integer|exists:brands,id',
            'sold_suggest' => 'required|numeric|min:0',
            'gender' => 'nullable|in:none,female,male,both',
            // Agregar estilos y etiquetas
            'styles' => 'array',
            'styles.*' => 'exists:styles,name',

            'tags' => 'array',
            'tags.*' => 'exists:tags,name',
            // complementos adicionales
            'components' => 'array',
            'components.*.component_id' => 'required|exists:component_products,id',
            'components.*.material_id' => 'nullable|exists:materials,id',
            'components.*.factor' => 'required|string',
            'components.*.description' => 'nullable|string|max:250',
            // detalles tecnicos
            'details' => 'array',
            'details.*.name' => 'string|max:100',
            'details.*.unit_type' => 'exists:unit_types,name',
            'details.*.amount' => 'string|max:5',
            // seccion de vinculacion con tags
            'status' => 'required|in:enable,disable',
        ];
    }

    public function messages(): array
    {
        return [
            // Información general
            'name.required' => 'El nombre del producto es obligatorio.',
            'name.string' => 'El nombre del producto debe ser un texto.',
            'name.max' => 'El nombre del producto no puede superar los 50 caracteres.',

            'presentation.string' => 'La presentación debe ser un texto.',
            'presentation.min' => 'La presentación debe tener al menos 2 caracteres.',
            'presentation.max' => 'La presentación no puede superar los 100 caracteres.',

            'category_id.required' => 'La categoría es obligatoria.',
            'category_id.integer' => 'La categoría seleccionada es inválida.',
            'category_id.exists' => 'La categoría seleccionada no existe.',

            'brand_id.required' => 'La marca es obligatoria.',
            'brand_id.integer' => 'La marca seleccionada es inválida.',
            'brand_id.exists' => 'La marca seleccionada no existe.',

            'sold_suggest.required' => 'El precio sugerido de venta es obligatorio.',
            'sold_suggest.numeric' => 'El precio sugerido de venta debe ser numérico.',
            'sold_suggest.min' => 'El precio sugerido de venta no puede ser negativo.',

            'gender.in' => 'El género seleccionado es inválido.',

            // Estilos
            'styles.array' => 'Los estilos deben enviarse como un arreglo.',
            'styles.*.integer' => 'El identificador del estilo es inválido.',
            'styles.*.exists' => 'Uno de los estilos seleccionados no existe.',

            // Etiquetas
            'tags.array' => 'Las etiquetas deben enviarse como un arreglo.',
            'tags.*.integer' => 'El identificador de la etiqueta es inválido.',
            'tags.*.exists' => 'Una de las etiquetas seleccionadas no existe.',

            // Componentes
            'components.array' => 'Los componentes deben enviarse como un arreglo.',

            'components.*.component_id.required' => 'El componente es obligatorio.',
            'components.*.component_id.exists' => 'El componente seleccionado no existe.',

            'components.*.material_id.exists' => 'El material seleccionado no existe.',

            'components.*.factor.required' => 'El factor del componente es obligatorio.',
            'components.*.factor.string' => 'El factor del componente debe ser un texto.',

            'components.*.description.string' => 'La descripción del componente debe ser un texto.',
            'components.*.description.max' => 'La descripción del componente no puede superar los 250 caracteres.',

            // Detalles técnicos
            'details.array' => 'Los detalles técnicos deben enviarse como un arreglo.',

            'details.*.name.string' => 'El nombre del detalle debe ser un texto.',
            'details.*.name.max' => 'El nombre del detalle no puede superar los 100 caracteres.',

            'details.*.unit_type_id.string' => 'La unidad de medida es inválida.',
            'details.*.unit_type_id.exists' => 'La unidad de medida seleccionada no existe.',

            'details.*.amount.string' => 'El valor del detalle debe ser un texto.',
            'details.*.amount.max' => 'El valor del detalle no puede superar los 5 caracteres.',

            // Estado
            'status.required' => 'El estado del producto es obligatorio.',
            'status.in' => 'El estado del producto es inválido.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
