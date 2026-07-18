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
            // en caso de que sea una nueva variante viene con esto
            'category_id' => 'required|integer|exists:categories,id',
            // la marca apunta a una persona
            // proveedor_id , es la persona que nos da el producto
            'brand_id' => 'required|integer|exists:people,id',

            'variant' => 'required|string|max:50',
            'sold_suggest_price' => 'required|numeric|min:0',
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
            'presentation' => 'required|string|max:100', // presentacion
            'unity' => 'nullable|string' , // numero de la unidad
            'unity_type' => 'nullable|string', // nombre de unidad
            'details' => 'nullable|string' , // alguna informacion que no se haya podido ingresar
            // ========================================================
            'status' => 'required|in:enable,disable',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
