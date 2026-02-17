@extends('layouts.app')

@section('title', 'Cursos')

@section('content')
    <h1>Cursos</h1>

    <a href="{{ route('admin.cursos.create') }}" class="btn btn-primary mb-3">Novo curso</a>

    <div class="table-responsive">
        <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th>Título</th>
                <th>Início</th>
                <th>Fim</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cursos as $curso)
                <tr>
                    <td>{{ $curso->titulo }}</td>
                    <td>{{ optional($curso->data_inicio)->format('d/m/Y') }}</td>
                    <td>{{ optional($curso->data_fim)->format('d/m/Y') }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('admin.cursos.show', $curso) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
                        <a href="{{ route('admin.cursos.edit', $curso) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                        <form action="{{ route('admin.cursos.destroy', $curso) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhum curso cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
        </table>
    </div>

    {{ $cursos->links() }}
@endsection
