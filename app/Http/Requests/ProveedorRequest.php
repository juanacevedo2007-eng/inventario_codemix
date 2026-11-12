<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProveedorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $proveedorId = $this->route('proveedor') ?? $this->route('id');

        return [
            'nombre_proveedor' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:120',
            ],

            'contacto' => [
                'nullable',
                'string',
                'max:120',
            ],

            'telefono' => [
                'nullable',
                'string',
                'max:20',
            ],

            'correo' => [
                'nullable',
                'email',
                'max:120',
            ],

            'direccion' => [
                'nullable',
                'string',
                'max:200',
            ],

            'estado' => [
                $isUpdate ? 'sometimes' : 'required',
                Rule::in(['Activo', 'Inactivo']),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_proveedor.required' => 'El nombre del proveedor es obligatorio.',
            'nombre_proveedor.string' => 'El nombre del proveedor debe ser texto.',
            'nombre_proveedor.max' => 'El nombre no puede exceder los 120 caracteres.',

            'contacto.string' => 'El contacto debe ser texto.',
            'contacto.max' => 'El contacto no puede exceder los 120 caracteres.',

            'telefono.string' => 'El teléfono debe ser texto.',
            'telefono.max' => 'El teléfono no puede exceder los 20 caracteres.',

            'correo.email' => 'Debe ingresar un correo electrónico válido.',
            'correo.max' => 'El correo no puede exceder los 120 caracteres.',

            'direccion.string' => 'La dirección debe ser texto.',
            'direccion.max' => 'La dirección no puede exceder los 200 caracteres.',

            'estado.required' => 'El estado del proveedor es obligatorio.',
            'estado.in' => 'El estado debe ser Activo o Inactivo.',
        ];
    }
}
