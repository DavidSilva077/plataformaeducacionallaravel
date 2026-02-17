@extends('layouts.app')

@section('title', 'Disciplinas')

@section('content')
    <h1>Disciplinas</h1>

    <a href="{{ route('admin.disciplinas.create') }}">Nova disciplina</a>

    <table>
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
                    <td>
                        <a href="{{ route('admin.disciplinas.show', $disciplina) }}">Ver</a>
                        <a href="{{ route('admin.disciplinas.edit', $disciplina) }}">Editar</a>
                        <form action="{{ route('admin.disciplinas.destroy', $disciplina) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
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

    {{ $disciplinas->links() }}
@endsection
