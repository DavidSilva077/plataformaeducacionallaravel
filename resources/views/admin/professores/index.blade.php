@extends('layouts.app')

@section('title', 'Professores')

@section('content')
    <h1>Professores</h1>

    <a href="{{ route('admin.professores.create') }}">Novo professor</a>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($professores as $professor)
                <tr>
                    <td>{{ $professor->nome }}</td>
                    <td>{{ $professor->email }}</td>
                    <td>
                        <a href="{{ route('admin.professores.show', $professor) }}">Ver</a>
                        <a href="{{ route('admin.professores.edit', $professor) }}">Editar</a>
                        <form action="{{ route('admin.professores.destroy', $professor) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum professor cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $professores->links() }}
@endsection
