<?php

namespace App\Http\Controllers\Admin;

use App\Models\Professor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProfessorRequest;
use App\Http\Requests\Admin\UpdateProfessorRequest;

class ProfessorController extends Controller
{
    public function index()
    {
        $professores = Professor::orderBy('nome')->paginate(10);

        return view('admin.professores.index', compact('professores'));
    }

    public function create()
    {
        return view('admin.professores.create');
    }

    public function store(StoreProfessorRequest $request)
    {
        Professor::create($request->validated());

        return redirect()->route('admin.professores.index');
    }

    public function show(Professor $professore)
    {
        return view('admin.professores.show', ['professor' => $professore]);
    }

    public function edit(Professor $professore)
    {
        return view('admin.professores.edit', ['professor' => $professore]);
    }

    public function update(UpdateProfessorRequest $request, Professor $professore)
    {
        $professore->update($request->validated());

        return redirect()->route('admin.professores.index');
    }

    public function destroy(Professor $professore)
    {
        $professore->delete();

        return redirect()->route('admin.professores.index');
    }
}
