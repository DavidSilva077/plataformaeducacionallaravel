<?php

namespace App\Http\Controllers\Admin;

use App\Models\Curso;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCursoRequest;
use App\Http\Requests\Admin\UpdateCursoRequest;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::orderBy('titulo')->paginate(10);

        return view('admin.cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('admin.cursos.create');
    }

    public function store(StoreCursoRequest $request)
    {
        Curso::create($request->validated());

        return redirect()->route('admin.cursos.index');
    }

    public function show(Curso $curso)
    {
        return view('admin.cursos.show', compact('curso'));
    }

    public function edit(Curso $curso)
    {
        return view('admin.cursos.edit', compact('curso'));
    }

    public function update(UpdateCursoRequest $request, Curso $curso)
    {
        $curso->update($request->validated());

        return redirect()->route('admin.cursos.index');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()->route('admin.cursos.index');
    }
}
