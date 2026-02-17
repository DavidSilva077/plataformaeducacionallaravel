<?php

namespace App\Http\Controllers\Admin;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Matricula;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMatriculaRequest;

class MatriculaController extends Controller
{
    public function index()
    {
        $matriculas = Matricula::with(['aluno', 'curso'])
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('admin.matriculas.index', compact('matriculas'));
    }

    public function create()
    {
        $alunos = Aluno::orderBy('nome')->pluck('nome', 'id');
        $cursos = Curso::orderBy('titulo')->pluck('titulo', 'id');

        return view('admin.matriculas.create', compact('alunos', 'cursos'));
    }

    public function store(StoreMatriculaRequest $request)
    {
        $aluno = Aluno::findOrFail($request->input('aluno_id'));
        $cursoIds = $request->input('curso_ids', []);

        $aluno->cursos()->syncWithoutDetaching($cursoIds);

        return redirect()->route('admin.matriculas.index');
    }

    public function destroy(Matricula $matricula)
    {
        $matricula->delete();

        return redirect()->route('admin.matriculas.index');
    }
}
