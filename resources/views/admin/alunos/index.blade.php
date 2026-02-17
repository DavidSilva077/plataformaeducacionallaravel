@extends('layouts.app')

@section('title', 'Alunos')

@section('content')
    <h1>Alunos</h1>

    <form method="GET" action="{{ route('admin.alunos.index') }}" class="row g-3 align-items-end">
        <div class="col-md-4">
            <label for="nome" class="form-label">Nome</label>
            <input id="nome" type="text" name="nome" value="{{ $nome }}" required class="form-control">
        </div>
        <div class="col-md-4">
            <label for="email" class="form-label">E-mail</label>
            <input id="email" type="text" name="email" value="{{ $email }}" required class="form-control">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-secondary">Filtrar</button>
        </div>
    </form>

    <a href="{{ route('admin.alunos.create') }}" class="btn btn-primary my-3">Novo aluno</a>

    <div class="table-responsive">
        <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Data de nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->email }}</td>
                    <td>{{ optional($aluno->data_nascimento)->format('d/m/Y') }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('admin.alunos.show', $aluno) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
                        <a href="{{ route('admin.alunos.edit', $aluno) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                        <form action="{{ route('admin.alunos.destroy', $aluno) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhum aluno cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
        </table>
    </div>

    {{ $alunos->links() }}
@endsection
