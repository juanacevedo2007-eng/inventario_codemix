<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VentaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $ventaId = $this->route('venta') ?? $this->route('id');

        return [
            'nombre_factura' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:100',
                Rule::unique('ventas', 'nombre_factura')->ignore($ventaId, 'id_venta'),
            ],

            'descuento' => [
                $isUpdate ? 'sometimes' : 'required',
                'numeric',
                'min:0',
            ],

            'iva' => [
                $isUpdate ? 'sometimes' : 'required',
                'numeric',
                'min:0',
            ],

            'total' => [
                $isUpdate ? 'sometimes' : 'required',
                'numeric',
                'min:0',
            ],

            'estado' => [
                $isUpdate ? 'sometimes' : 'sometimes',
                Rule::in(['Pendiente', 'Pagado', 'Anulada']),
            ],

            'id_usuario' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:usuarios,id_usuario',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_factura.required' => 'El nombre de la factura es obligatorio.',
            'nombre_factura.string' => 'El nombre de la factura debe ser texto.',
            'nombre_factura.max' => 'El nombre de la factura no puede exceder los 100 caracteres.',
            'nombre_factura.unique' => 'Este nombre de factura ya está registrado.',

            'descuento.required' => 'El descuento es obligatorio.',
            'descuento.numeric' => 'El descuento debe ser numérico.',
            'descuento.min' => 'El descuento no puede ser negativo.',

            'iva.required' => 'El IVA es obligatorio.',
            'iva.numeric' => 'El IVA debe ser numérico.',
            'iva.min' => 'El IVA no puede ser negativo.',

            'total.required' => 'El total de la venta es obligatorio.',
            'total.numeric' => 'El total debe ser numérico.',
            'total.min' => 'El total no puede ser negativo.',

            'estado.in' => 'El estado debe ser Pendiente, Pagado o Anulada.',

            'id_usuario.required' => 'Debe seleccionar un usuario.',
            'id_usuario.integer' => 'El usuario debe ser un número entero.',
            'id_usuario.exists' => 'El usuario seleccionado no existe.',
        ];
    }
}
