<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $compraId = $this->route('compra') ?? $this->route('id');

        return [
            'total' => [
                $isUpdate ? 'sometimes' : 'sometimes',
                'numeric',
                'min:0',
            ],

            'estado' => [
                $isUpdate ? 'sometimes' : 'sometimes',
                Rule::in(['Pendiente', 'Recibido', 'Anulada']),
            ],

            'id_proveedor' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:proveedores,id_proveedor',
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
            'total.numeric' => 'El total de la compra debe ser numérico.',
            'total.min' => 'El total de la compra no puede ser negativo.',

            'estado.in' => 'El estado debe ser Pendiente, Recibido o Anulada.',

            'id_proveedor.required' => 'Debe seleccionar un proveedor.',
            'id_proveedor.integer' => 'El proveedor debe ser un número entero.',
            'id_proveedor.exists' => 'El proveedor seleccionado no existe.',

            'id_usuario.required' => 'Debe seleccionar un usuario.',
            'id_usuario.integer' => 'El usuario debe ser un número entero.',
            'id_usuario.exists' => 'El usuario seleccionado no existe.',
        ];
    }
}
