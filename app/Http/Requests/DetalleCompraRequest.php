<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalleCompraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $detalleCompraId = $this->route('detalle_compra') ?? $this->route('id');

        return [
            'id_compra' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:compras,id_compra',
            ],

            'id_producto' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:productos,id_producto',
            ],

            'cantidad' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:1',
            ],

            'precio_compra' => [
                $isUpdate ? 'sometimes' : 'required',
                'numeric',
                'min:0',
            ],

            'subtotal' => [
                $isUpdate ? 'sometimes' : 'required',
                'numeric',
                'min:0',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'id_compra.required' => 'Debe seleccionar una compra.',
            'id_compra.integer' => 'La compra debe ser un número entero.',
            'id_compra.exists' => 'La compra seleccionada no existe.',

            'id_producto.required' => 'Debe seleccionar un producto.',
            'id_producto.integer' => 'El producto debe ser un número entero.',
            'id_producto.exists' => 'El producto seleccionado no existe.',

            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser como mínimo 1.',

            'precio_compra.required' => 'El precio de compra es obligatorio.',
            'precio_compra.numeric' => 'El precio de compra debe ser numérico.',
            'precio_compra.min' => 'El precio de compra no puede ser negativo.',

            'subtotal.required' => 'El subtotal es obligatorio.',
            'subtotal.numeric' => 'El subtotal debe ser numérico.',
            'subtotal.min' => 'El subtotal no puede ser negativo.',
        ];
    }
}
