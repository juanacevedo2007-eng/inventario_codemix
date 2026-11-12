<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MovimientoStockRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $movimientoStockId = $this->route('movimiento_stock') ?? $this->route('id');

        return [
            'id_producto' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:productos,id_producto',
            ],

            'id_usuario' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:usuarios,id_usuario',
            ],

            'id_proveedor' => [
                'nullable',
                'integer',
                'exists:proveedores,id_proveedor',
            ],

            'id_compra' => [
                'nullable',
                'integer',
                'exists:compras,id_compra',
                'required_if:tipo_movimiento,Entrada',
            ],

            'id_venta' => [
                'nullable',
                'integer',
                'exists:ventas,id_venta',
                'required_if:tipo_movimiento,Salida',
            ],

            'tipo_movimiento' => [
                $isUpdate ? 'sometimes' : 'required',
                Rule::in(['Entrada', 'Salida', 'Ajuste']),
            ],

            'cantidad' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:1',
            ],

            'stock_antes' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:0',
            ],

            'stock_despues' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:0',
            ],

            'motivo' => [
                'nullable',
                'string',
                'max:255',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'id_producto.required' => 'Debe seleccionar un producto.',
            'id_producto.integer' => 'El producto debe ser un número entero.',
            'id_producto.exists' => 'El producto seleccionado no existe.',

            'id_usuario.required' => 'Debe seleccionar un usuario.',
            'id_usuario.integer' => 'El usuario debe ser un número entero.',
            'id_usuario.exists' => 'El usuario seleccionado no existe.',

            'id_proveedor.integer' => 'El proveedor debe ser un número entero.',
            'id_proveedor.exists' => 'El proveedor seleccionado no existe.',

            'id_compra.integer' => 'La compra debe ser un número entero.',
            'id_compra.exists' => 'La compra seleccionada no existe.',
            'id_compra.required_if' => 'Debe seleccionar una compra para registrar una entrada.',

            'id_venta.integer' => 'La venta debe ser un número entero.',
            'id_venta.exists' => 'La venta seleccionada no existe.',
            'id_venta.required_if' => 'Debe seleccionar una venta para registrar una salida.',

            'tipo_movimiento.required' => 'El tipo de movimiento es obligatorio.',
            'tipo_movimiento.in' => 'El movimiento debe ser Entrada, Salida o Ajuste.',

            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser como mínimo 1.',

            'stock_antes.required' => 'El stock anterior es obligatorio.',
            'stock_antes.integer' => 'El stock anterior debe ser un número entero.',
            'stock_antes.min' => 'El stock anterior no puede ser negativo.',

            'stock_despues.required' => 'El stock posterior es obligatorio.',
            'stock_despues.integer' => 'El stock posterior debe ser un número entero.',
            'stock_despues.min' => 'El stock posterior no puede ser negativo.',

            'motivo.string' => 'El motivo debe ser texto.',
            'motivo.max' => 'El motivo no puede exceder los 255 caracteres.',
        ];
    }
}
