@extends('layouts.app')

@section('title', 'Matrículas')

@section('content')
    <h1>Matrículas</h1>

    <a href="{{ route('admin.matriculas.create') }}">Nova matrícula</a>

    <table>
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
                        <form action="{{ route('admin.matriculas.destroy', $matricula) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Remover</button>
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

    {{ $matriculas->links() }}
@endsection
