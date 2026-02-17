<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAlunoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $alunoId = $this->route('aluno') ? $this->route('aluno')->id : null;

        return [
            'nome' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('alunos', 'email')->ignore($alunoId),
            ],
            'data_nascimento' => ['nullable', 'date'],
        ];
    }
}
