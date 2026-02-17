<?php

namespace App\Http\Controllers\Admin;

use App\Models\Curso;
use App\Models\Professor;
use App\Models\Disciplina;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDisciplinaRequest;
use App\Http\Requests\Admin\UpdateDisciplinaRequest;

class DisciplinaController extends Controller
{
    public function index()
    {
        $disciplinas = Disciplina::with(['curso', 'professor'])
            ->orderBy('titulo')
            ->paginate(10);

        return view('admin.disciplinas.index', compact('disciplinas'));
    }

    public function create()
    {
        $cursos = Curso::orderBy('titulo')->pluck('titulo', 'id');
        $professores = Professor::orderBy('nome')->pluck('nome', 'id');

        return view('admin.disciplinas.create', compact('cursos', 'professores'));
    }

    public function store(StoreDisciplinaRequest $request)
    {
        Disciplina::create($request->validated());

        return redirect()->route('admin.disciplinas.index');
    }

    public function show(Disciplina $disciplina)
    {
        $disciplina->load(['curso', 'professor']);

        return view('admin.disciplinas.show', compact('disciplina'));
    }

    public function edit(Disciplina $disciplina)
    {
        $cursos = Curso::orderBy('titulo')->pluck('titulo', 'id');
        $professores = Professor::orderBy('nome')->pluck('nome', 'id');

        return view('admin.disciplinas.edit', compact('disciplina', 'cursos', 'professores'));
    }

    public function update(UpdateDisciplinaRequest $request, Disciplina $disciplina)
    {
        $disciplina->update($request->validated());

        return redirect()->route('admin.disciplinas.index');
    }

    public function destroy(Disciplina $disciplina)
    {
        $disciplina->delete();

        return redirect()->route('admin.disciplinas.index');
    }
}
