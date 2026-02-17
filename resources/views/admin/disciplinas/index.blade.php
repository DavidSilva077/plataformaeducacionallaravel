@extends('layouts.app')

@section('title', 'Disciplinas')

@section('content')
    <h1>Disciplinas</h1>

    <a href="{{ route('admin.disciplinas.create') }}" class="btn btn-primary mb-3">Nova disciplina</a>

    <div class="table-responsive">
        <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th>Título</th>
                <th>Curso</th>
                <th>Professor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($disciplinas as $disciplina)
                <tr>
                    <td>{{ $disciplina->titulo }}</td>
                    <td>{{ optional($disciplina->curso)->titulo }}</td>
                    <td>{{ optional($disciplina->professor)->nome }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('admin.disciplinas.show', $disciplina) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
                        <a href="{{ route('admin.disciplinas.edit', $disciplina) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                        <form action="{{ route('admin.disciplinas.destroy', $disciplina) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhuma disciplina cadastrada.</td>
                </tr>
            @endforelse
        </tbody>
        </table>
    </div>

    {{ $disciplinas->links() }}
@endsection
