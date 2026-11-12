<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecuperacionContraseñaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $recuperacionId = $this->route('recuperacion') ?? $this->route('id');

        return [
            'id_usuario' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:usuarios,id_usuario',
            ],

            'codigo' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:255',
            ],

            'fecha_expiracion' => [
                $isUpdate ? 'sometimes' : 'required',
                'date',
                'after:now',
            ],

            'usado' => [
                'sometimes',
                'boolean',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'id_usuario.required' => 'Debe seleccionar un usuario.',
            'id_usuario.integer' => 'El usuario debe ser un número entero.',
            'id_usuario.exists' => 'El usuario seleccionado no existe.',

            'codigo.required' => 'El código de recuperación es obligatorio.',
            'codigo.string' => 'El código de recuperación debe ser texto.',
            'codigo.max' => 'El código no puede exceder los 255 caracteres.',

            'fecha_expiracion.required' => 'La fecha de expiración es obligatoria.',
            'fecha_expiracion.date' => 'La fecha de expiración debe ser válida.',
            'fecha_expiracion.after' => 'La fecha de expiración debe ser posterior a la fecha y hora actual.',

            'usado.boolean' => 'El campo usado debe ser verdadero o falso.',
        ];
    }
}
