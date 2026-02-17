@extends('layouts.app')

@section('title', 'Nova Matrícula')

@section('content')
    <h1>Nova matrícula</h1>

    <form method="POST" action="{{ route('admin.matriculas.store') }}">
        @csrf

        <div>
            <label for="aluno_id">Aluno</label>
            <select id="aluno_id" name="aluno_id" required>
                <option value="">Selecione</option>
                @foreach ($alunos as $id => $nome)
                    <option value="{{ $id }}" {{ old('aluno_id') == $id ? 'selected' : '' }}>
                        {{ $nome }}
                    </option>
                @endforeach
            </select>
            @error('aluno_id')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="curso_ids">Cursos</label>
            <select id="curso_ids" name="curso_ids[]" multiple required>
                @foreach ($cursos as $id => $titulo)
                    <option value="{{ $id }}" {{ collect(old('curso_ids', []))->contains($id) ? 'selected' : '' }}>
                        {{ $titulo }}
                    </option>
                @endforeach
            </select>
            @error('curso_ids')
                <span>{{ $message }}</span>
            @enderror
            @error('curso_ids.*')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Matricular</button>
    </form>
@endsection
