<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NotificacionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $notificacionId = $this->route('notificacion') ?? $this->route('id');

        return [
            'id_usuario' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:usuarios,id_usuario',
            ],

            'id_producto' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:productos,id_producto',
            ],

            'titulo' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:150',
            ],

            'mensaje' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
            ],

            'leido' => [
                'sometimes',
                'boolean',
            ],

            'fecha' => [
                $isUpdate ? 'sometimes' : 'required',
                'date',
            ],

            'tipo_alerta' => [
                $isUpdate ? 'sometimes' : 'required',
                Rule::in(['Bajo_Stock', 'Agotado', 'Proximo_Vencimiento']),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'id_usuario.required' => 'Debe seleccionar un usuario.',
            'id_usuario.integer' => 'El usuario debe ser un número entero.',
            'id_usuario.exists' => 'El usuario seleccionado no existe.',

            'id_producto.required' => 'Debe seleccionar un producto.',
            'id_producto.integer' => 'El producto debe ser un número entero.',
            'id_producto.exists' => 'El producto seleccionado no existe.',

            'titulo.required' => 'El título de la notificación es obligatorio.',
            'titulo.string' => 'El título debe ser texto.',
            'titulo.max' => 'El título no puede exceder los 150 caracteres.',

            'mensaje.required' => 'El mensaje de la notificación es obligatorio.',
            'mensaje.string' => 'El mensaje debe ser texto.',

            'leido.boolean' => 'El campo leído debe ser verdadero o falso.',

            'fecha.required' => 'La fecha de la notificación es obligatoria.',
            'fecha.date' => 'La fecha de la notificación debe ser válida.',

            'tipo_alerta.required' => 'El tipo de alerta es obligatorio.',
            'tipo_alerta.in' => 'El tipo de alerta debe ser Bajo_Stock, Agotado o Proximo_Vencimiento.',
        ];
    }
}
