@extends('layouts.app')

@section('title', 'Matrículas')

@section('content')
    <h1>Matrículas</h1>

    <a href="{{ route('admin.matriculas.create') }}" class="btn btn-primary mb-3">Nova matrícula</a>

    <div class="table-responsive">
        <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th>Aluno</th>
                <th>Curso</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($matriculas as $matricula)
                <tr>
                    <td>{{ optional($matricula->aluno)->nome }}</td>
                    <td>{{ optional($matricula->curso)->titulo }}</td>
                    <td>{{ $matricula->created_at->format('d/m/Y') }}</td>
                    <td>
                        <form action="{{ route('admin.matriculas.destroy', $matricula) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Remover</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhuma matrícula registrada.</td>
                </tr>
            @endforelse
        </tbody>
        </table>
    </div>

    {{ $matriculas->links() }}
@endsection
