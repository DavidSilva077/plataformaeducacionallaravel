@extends('layouts.app')

@section('title', 'Alunos')

@section('content')
    <h1>Alunos</h1>

    <form method="GET" action="{{ route('admin.alunos.index') }}">
        <div>
            <label for="nome">Nome</label>
            <input id="nome" type="text" name="nome" value="{{ $nome }}" required>
        </div>
        <div>
            <label for="email">E-mail</label>
            <input id="email" type="text" name="email" value="{{ $email }}" required>
        </div>
        <button type="submit">Filtrar</button>
    </form>

    <a href="{{ route('admin.alunos.create') }}">Novo aluno</a>

    <table>
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
                    <td>
                        <a href="{{ route('admin.alunos.show', $aluno) }}">Ver</a>
                        <a href="{{ route('admin.alunos.edit', $aluno) }}">Editar</a>
                        <form action="{{ route('admin.alunos.destroy', $aluno) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
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

    {{ $alunos->links() }}
@endsection
