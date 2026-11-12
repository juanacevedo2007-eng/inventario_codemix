<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestUsuario extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $usuarioId = $this->route('usuario') ?? $this->route('id');

        return [
            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:100',
            ],
            'apellido' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:100',
            ],
            'tipo_documento' => [
                $isUpdate ? 'sometimes' : 'required',
                Rule::in(['CC', 'CE', 'Pasaporte']),
            ],
            'numero_documento' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:30',
                Rule::unique('usuarios', 'numero_documento')
                    ->ignore($usuarioId, 'id_usuario'),
            ],
            'correo' => [
                $isUpdate ? 'sometimes' : 'required',
                'email',
                'max:100',
                Rule::unique('usuarios', 'correo')
                    ->ignore($usuarioId, 'id_usuario'),
            ],
            'telefono' => [
                'nullable',
                'string',
                'max:20',
            ],
            'password' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'min:8',
                'max:255',
            ],
            'id_rol' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:roles,id_rol',
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
            'nombre.required' => 'El nombre del usuario es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede exceder los 100 caracteres.',

            'apellido.required' => 'El apellido del usuario es obligatorio.',
            'apellido.string' => 'El apellido debe ser texto.',
            'apellido.max' => 'El apellido no puede exceder los 100 caracteres.',

            'tipo_documento.required' => 'El tipo de documento es obligatorio.',
            'tipo_documento.in' => 'El tipo de documento seleccionado no es válido.',

            'numero_documento.required' => 'El número de documento es obligatorio.',
            'numero_documento.string' => 'El número de documento debe ser texto.',
            'numero_documento.max' => 'El número de documento no puede exceder los 30 caracteres.',
            'numero_documento.unique' => 'Este número de documento ya está registrado.',

            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'El correo electrónico no tiene un formato válido.',
            'correo.max' => 'El correo no puede exceder los 100 caracteres.',
            'correo.unique' => 'Este correo electrónico ya está registrado.',

            'telefono.string' => 'El teléfono debe ser texto.',
            'telefono.max' => 'El teléfono no puede exceder los 20 caracteres.',

            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser texto.',
            'password.min' => 'La contraseña debe tener mínimo 8 caracteres.',
            'password.max' => 'La contraseña no puede exceder los 255 caracteres.',

            'id_rol.required' => 'El rol del usuario es obligatorio.',
            'id_rol.integer' => 'El identificador del rol debe ser un número entero.',
            'id_rol.exists' => 'El rol seleccionado no existe.',

            'estado.required' => 'El estado del usuario es obligatorio.',
            'estado.in' => 'El estado debe ser Activo o Inactivo.',
        ];
    }
}
```