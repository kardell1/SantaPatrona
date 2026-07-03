<?php

namespace Modules\Products\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    // Este request solo es para crear un producto de zapataria que contenga esto
    // Para lo que le sigue, vamos a crear otro boton donde reciba :
    // pegamentos, guatos , hilos , cartones , etc
    public function rules(): array
    {
        // creacion de calzados, plantas , y todo lo que sea que tenga talla ,
        return [
            // datos basicos de producto ===============================
            'name' => 'required|string|max:50',
            'category_id' => 'required|integer|exists:categories,id',
            // la marca apunta a una persona
            // proveedor_id , es la persona que nos da el producto
            'provider_id' => 'required|integer|exists:people,id',

            'variant_name' => 'required|string|max:50',
            'variant_sold_suggest_price' => 'required|numeric|min:0',
            // =========================================================

            // seccion de variantes ====================================
            'has_variant' => 'required|bool', // de control
            'materials' => 'nullable|array',
            'materials.*' => 'nullable|integer|exists:materials,id',

            'colors' => 'nullable|array',
            'colors.*' => 'integer|exists:colors,id',

            'sizes' => 'nullable|array',
            'sizes.*' => 'integer|exists:sizes,id',

            'tags.*' => 'nullable|integer|exists:tags,id',
            // ========================================================

            // convertir esta parte en un array en el futuro para que agreguen mas detalles
            // seccion de detalles ====================================
            'presentation' => 'nullable', // presentacion
            'unity' => '' , // numero de la unidad
            'unity_type' => '', // nombre de unidad
            'details' => '' , // alguna informacion que no se haya podido ingresar
            // ========================================================
            // los posibles estados deberian habilitado, deshabilitado
            'status' => 'required|in:enable,disable',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
