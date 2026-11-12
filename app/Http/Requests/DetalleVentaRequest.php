<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalleVentaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $detalleVentaId = $this->route('detalle_venta') ?? $this->route('id');

        return [
            'id_venta' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:ventas,id_venta',
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

            'precio_unitario' => [
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
            'id_venta.required' => 'Debe seleccionar una venta.',
            'id_venta.integer' => 'La venta debe ser un número entero.',
            'id_venta.exists' => 'La venta seleccionada no existe.',

            'id_producto.required' => 'Debe seleccionar un producto.',
            'id_producto.integer' => 'El producto debe ser un número entero.',
            'id_producto.exists' => 'El producto seleccionado no existe.',

            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser como mínimo 1.',

            'precio_unitario.required' => 'El precio unitario es obligatorio.',
            'precio_unitario.numeric' => 'El precio unitario debe ser numérico.',
            'precio_unitario.min' => 'El precio unitario no puede ser negativo.',

            'subtotal.required' => 'El subtotal es obligatorio.',
            'subtotal.numeric' => 'El subtotal debe ser numérico.',
            'subtotal.min' => 'El subtotal no puede ser negativo.',
        ];
    }
}
