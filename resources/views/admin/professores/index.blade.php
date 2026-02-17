@extends('layouts.app')

@section('title', 'Professores')

@section('content')
    <h1>Professores</h1>

    <a href="{{ route('admin.professores.create') }}" class="btn btn-primary mb-3">Novo professor</a>

    <div class="table-responsive">
        <table class="table table-striped align-middle">
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
                    <td class="d-flex gap-2">
                        <a href="{{ route('admin.professores.show', $professor) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
                        <a href="{{ route('admin.professores.edit', $professor) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                        <form action="{{ route('admin.professores.destroy', $professor) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
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
    </div>

    {{ $professores->links() }}
@endsection
