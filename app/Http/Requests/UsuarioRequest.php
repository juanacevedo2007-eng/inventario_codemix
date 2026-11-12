<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UsuarioRequest extends FormRequest
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
                'max:255',
            ],

            'email' => [
                $isUpdate ? 'sometimes' : 'required',
                'email',
                'max:225',
                Rule::unique('usuarios', 'email')->ignore($usuarioId, 'id_usuario'),
            ],

            'password' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                Password::min(8)->letters()->mixedCase()->numbers(),
            ],

            'estado' => [
                $isUpdate ? 'sometimes' : 'required',
                Rule::in(['activo', 'inactivo']),
            ],

            'intentos' => [
                'sometimes',
                'integer',
                'min:0',
            ],

            'id_rol' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:roles,id_rol',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del usuario es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede exceder los 255 caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe ingresar un correo electrónico válido.',
            'email.max' => 'El correo no puede exceder los 225 caracteres.',
            'email.unique' => 'Este correo electrónico ya está registrado.',

            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser texto.',
            'password.min' => 'La contraseña debe tener mínimo 8 caracteres.',
            'password.letters' => 'La contraseña debe contener letras.',
            'password.mixed' => 'La contraseña debe combinar mayúsculas y minúsculas.',
            'password.numbers' => 'La contraseña debe contener números.',

            'estado.required' => 'El estado del usuario es obligatorio.',
            'estado.in' => 'El estado debe ser activo o inactivo.',

            'intentos.integer' => 'Los intentos deben ser un número entero.',
            'intentos.min' => 'Los intentos no pueden ser negativos.',

            'id_rol.required' => 'Debe seleccionar un rol.',
            'id_rol.exists' => 'El rol seleccionado no existe.',
        ];
    }
}
