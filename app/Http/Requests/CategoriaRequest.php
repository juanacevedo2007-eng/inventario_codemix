
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $categoriaId = $this->route('categoria') ?? $this->route('id');

        return [
            'nombre_categoria' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:100',
                Rule::unique('categorias', 'nombre_categoria')
                    ->ignore($categoriaId, 'id_categoria'),
            ],
            'descripcion' => [
                $isUpdate ? 'sometimes' : 'required',
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
            'nombre_categoria.required' => 'El nombre de la categoría es obligatorio.',
            'nombre_categoria.string' => 'El nombre de la categoría debe ser texto.',
            'nombre_categoria.max' => 'El nombre de la categoría no puede exceder los 100 caracteres.',
            'nombre_categoria.unique' => 'Esta categoría ya está registrada.',

            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string' => 'La descripción debe ser texto.',
            'descripcion.max' => 'La descripción no puede exceder los 225 caracteres.',

            'estado.required' => 'El estado de la categoría es obligatorio.',
            'estado.in' => 'El estado debe ser Activo o Inactivo.',
        ];
    }
}
```