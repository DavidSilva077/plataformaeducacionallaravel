<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreMatriculaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'aluno_id' => ['required', 'exists:alunos,id'],
            'curso_ids' => ['required', 'array'],
            'curso_ids.*' => ['integer', 'exists:cursos,id'],
        ];
    }
}
