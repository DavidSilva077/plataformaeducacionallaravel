<?php

namespace App\Http\Controllers\Admin;

use App\Models\Aluno;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAlunoRequest;
use App\Http\Requests\Admin\UpdateAlunoRequest;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index(Request $request)
    {
        $nome = $request->input('nome');
        $email = $request->input('email');

        $alunos = Aluno::query()
            ->when($nome, function ($query) use ($nome) {
                $query->where('nome', 'like', "%{$nome}%");
            })
            ->when($email, function ($query) use ($email) {
                $query->where('email', 'like', "%{$email}%");
            })
            ->orderBy('nome')
            ->paginate(10)
            ->appends($request->only(['nome', 'email']));

        return view('admin.alunos.index', compact('alunos', 'nome', 'email'));
    }

    public function create()
    {
        return view('admin.alunos.create');
    }

    public function store(StoreAlunoRequest $request)
    {
        Aluno::create($request->validated());

        return redirect()->route('admin.alunos.index');
    }

    public function show(Aluno $aluno)
    {
        return view('admin.alunos.show', compact('aluno'));
    }

    public function edit(Aluno $aluno)
    {
        return view('admin.alunos.edit', compact('aluno'));
    }

    public function update(UpdateAlunoRequest $request, Aluno $aluno)
    {
        $aluno->update($request->validated());

        return redirect()->route('admin.alunos.index');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();

        return redirect()->route('admin.alunos.index');
    }
}
