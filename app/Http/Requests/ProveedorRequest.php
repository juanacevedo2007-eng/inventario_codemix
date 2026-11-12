<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestProveedor extends FormRequest
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
            'tipo_documento' => [
                $isUpdate ? 'sometimes' : 'required',
                Rule::in(['CC', 'NIT', 'CE', 'Pasaporte']),
            ],
            'numero_documento' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:30',
                Rule::unique('proveedores', 'numero_documento')
                    ->ignore($proveedorId, 'id_proveedor'),
            ],
            'nombre_proveedor' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:150',
            ],
            'telefono' => [
                'nullable',
                'string',
                'max:20',
            ],
            'correo' => [
                'nullable',
                'email',
                'max:100',
            ],
            'direccion' => [
                'nullable',
                'string',
                'max:225',
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
            'tipo_documento.required' => 'El tipo de documento es obligatorio.',
            'tipo_documento.in' => 'El tipo de documento seleccionado no es válido.',

            'numero_documento.required' => 'El número de documento es obligatorio.',
            'numero_documento.string' => 'El número de documento debe ser texto.',
            'numero_documento.max' => 'El número de documento no puede exceder los 30 caracteres.',
            'numero_documento.unique' => 'Este número de documento ya está registrado.',

            'nombre_proveedor.required' => 'El nombre del proveedor es obligatorio.',
            'nombre_proveedor.string' => 'El nombre del proveedor debe ser texto.',
            'nombre_proveedor.max' => 'El nombre del proveedor no puede exceder los 150 caracteres.',

            'telefono.string' => 'El teléfono debe ser texto.',
            'telefono.max' => 'El teléfono no puede exceder los 20 caracteres.',

            'correo.email' => 'El correo electrónico no tiene un formato válido.',
            'correo.max' => 'El correo no puede exceder los 100 caracteres.',

            'direccion.string' => 'La dirección debe ser texto.',
            'direccion.max' => 'La dirección no puede exceder los 225 caracteres.',

            'estado.required' => 'El estado del proveedor es obligatorio.',
            'estado.in' => 'El estado debe ser Activo o Inactivo.',
        ];
    }
}
```