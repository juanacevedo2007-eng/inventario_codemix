<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RolRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $rolId = $this->route('rol') ?? $this->route('id');

        return [
            'nombre_rol' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:50',
                Rule::unique('roles', 'nombre_rol')->ignore($rolId, 'id_rol'),
            ],
            'descripcion' => [
                'nullable',
                'string',
                'max:225',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_rol.required' => 'El nombre del rol es obligatorio.',
            'nombre_rol.string' => 'El nombre del rol debe ser texto.',
            'nombre_rol.max' => 'El nombre del rol no puede exceder los 50 caracteres.',
            'nombre_rol.unique' => 'Este nombre de rol ya está registrado.',

            'descripcion.string' => 'La descripción debe ser texto.',
            'descripcion.max' => 'La descripción no puede exceder los 225 caracteres.',
        ];
    }
}
```