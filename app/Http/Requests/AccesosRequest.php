<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccesosRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $accesoId = $this->route('acceso') ?? $this->route('id');

        return [
            'id_usuario' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:usuarios,id_usuario',
            ],

            'dispositivo' => [
                'nullable',
                'string',
                'max:100',
            ],

            'navegador' => [
                'nullable',
                'string',
                'max:100',
            ],

            'ubicacion' => [
                'nullable',
                'string',
                'max:100',
            ],

            'fecha_ingreso' => [
                $isUpdate ? 'sometimes' : 'required',
                'date',
            ],

            'fecha_salida' => [
                'nullable',
                'date',
                'after_or_equal:fecha_ingreso',
            ],

            'estado' => [
                $isUpdate ? 'sometimes' : 'required',
                Rule::in(['activo', 'inactivo']),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'id_usuario.required' => 'Debe seleccionar un usuario.',
            'id_usuario.integer' => 'El usuario debe ser un número entero.',
            'id_usuario.exists' => 'El usuario seleccionado no existe.',

            'dispositivo.string' => 'El dispositivo debe ser texto.',
            'dispositivo.max' => 'El dispositivo no puede exceder los 100 caracteres.',

            'navegador.string' => 'El navegador debe ser texto.',
            'navegador.max' => 'El navegador no puede exceder los 100 caracteres.',

            'ubicacion.string' => 'La ubicación debe ser texto.',
            'ubicacion.max' => 'La ubicación no puede exceder los 100 caracteres.',

            'fecha_ingreso.required' => 'La fecha de ingreso es obligatoria.',
            'fecha_ingreso.date' => 'La fecha de ingreso debe ser válida.',

            'fecha_salida.date' => 'La fecha de salida debe ser válida.',
            'fecha_salida.after_or_equal' => 'La fecha de salida no puede ser anterior a la fecha de ingreso.',

            'estado.required' => 'El estado del acceso es obligatorio.',
            'estado.in' => 'El estado debe ser activo o inactivo.',
        ];
    }
}
