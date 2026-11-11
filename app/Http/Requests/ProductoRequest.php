<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $productoId = $this->route('producto') ?? $this->route('id');

        return [
            'codigo' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:30',
                Rule::unique('productos', 'codigo')->ignore($productoId, 'id_producto'),
            ],

            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:120',
            ],

            'descripcion' => [
                'nullable',
                'string',
                'max:255',
            ],

            'marca' => [
                'nullable',
                'string',
                'max:100',
            ],

            'precio_compra' => [
                $isUpdate ? 'sometimes' : 'required',
                'numeric',
                'min:0',
            ],

            'precio_venta' => [
                $isUpdate ? 'sometimes' : 'required',
                'numeric',
                'min:0',
                'gte:precio_compra',
            ],

            'stock_actual' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:0',
            ],

            'stock_minimo' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:0',
            ],

            'fecha_vencimiento' => [
                'nullable',
                'date',
                'after_or_equal:today',
            ],

            'estado' => [
                $isUpdate ? 'sometimes' : 'required',
                Rule::in(['Activo', 'Inactivo']),
            ],

            'id_categoria' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:categorias,id_categoria',
            ],

            'id_proveedor' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:proveedores,id_proveedor',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'codigo.required' => 'El código del producto es obligatorio.',
            'codigo.string' => 'El código del producto debe ser texto.',
            'codigo.max' => 'El código no puede exceder los 30 caracteres.',
            'codigo.unique' => 'Este código de producto ya está registrado.',

            'nombre.required' => 'El nombre del producto es obligatorio.',
            'nombre.string' => 'El nombre del producto debe ser texto.',
            'nombre.max' => 'El nombre no puede exceder los 120 caracteres.',

            'descripcion.string' => 'La descripción debe ser texto.',
            'descripcion.max' => 'La descripción no puede exceder los 255 caracteres.',

            'marca.string' => 'La marca debe ser texto.',
            'marca.max' => 'La marca no puede exceder los 100 caracteres.',

            'precio_compra.required' => 'El precio de compra es obligatorio.',
            'precio_compra.numeric' => 'El precio de compra debe ser numérico.',
            'precio_compra.min' => 'El precio de compra no puede ser negativo.',

            'precio_venta.required' => 'El precio de venta es obligatorio.',
            'precio_venta.numeric' => 'El precio de venta debe ser numérico.',
            'precio_venta.min' => 'El precio de venta no puede ser negativo.',
            'precio_venta.gte' => 'El precio de venta no puede ser inferior al precio de compra.',

            'stock_actual.required' => 'El stock actual es obligatorio.',
            'stock_actual.integer' => 'El stock actual debe ser un número entero.',
            'stock_actual.min' => 'El stock actual no puede ser negativo.',

            'stock_minimo.required' => 'El stock mínimo es obligatorio.',
            'stock_minimo.integer' => 'El stock mínimo debe ser un número entero.',
            'stock_minimo.min' => 'El stock mínimo no puede ser negativo.',

            'fecha_vencimiento.date' => 'La fecha de vencimiento no es válida.',
            'fecha_vencimiento.after_or_equal' => 'La fecha de vencimiento no puede ser anterior a la fecha de registro.',

            'estado.required' => 'El estado del producto es obligatorio.',
            'estado.in' => 'El estado debe ser Activo o Inactivo.',

            'id_categoria.required' => 'La categoría es obligatoria.',
            'id_categoria.integer' => 'El identificador de la categoría debe ser un número entero.',
            'id_categoria.exists' => 'La categoría seleccionada no existe.',

            'id_proveedor.required' => 'El proveedor es obligatorio.',
            'id_proveedor.integer' => 'El identificador del proveedor debe ser un número entero.',
            'id_proveedor.exists' => 'El proveedor seleccionado no existe.',
        ];
    }
}