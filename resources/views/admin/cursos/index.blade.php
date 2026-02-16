@extends('layouts.app')

@section('title', 'Cursos')

@section('content')
    <h1>Cursos</h1>

    <a href="{{ route('admin.cursos.create') }}">Novo curso</a>

    <table>
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
                    <td>
                        <a href="{{ route('admin.cursos.show', $curso) }}">Ver</a>
                        <a href="{{ route('admin.cursos.edit', $curso) }}">Editar</a>
                        <form action="{{ route('admin.cursos.destroy', $curso) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
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

    {{ $cursos->links() }}
@endsection
