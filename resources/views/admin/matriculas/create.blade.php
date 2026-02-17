@extends('layouts.app')

@section('title', 'Nova Matrícula')

@section('content')
    <h1>Nova matrícula</h1>

    <form method="POST" action="{{ route('admin.matriculas.store') }}" class="col-lg-6">
        @csrf

        <div class="mb-3">
            <label for="aluno_id" class="form-label">Aluno</label>
            <select id="aluno_id" name="aluno_id" required class="form-select">
                <option value="">Selecione</option>
                @foreach ($alunos as $id => $nome)
                    <option value="{{ $id }}" {{ old('aluno_id') == $id ? 'selected' : '' }}>
                        {{ $nome }}
                    </option>
                @endforeach
            </select>
            @error('aluno_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="curso_ids" class="form-label">Cursos</label>
            <select id="curso_ids" name="curso_ids[]" multiple required class="form-select">
                @foreach ($cursos as $id => $titulo)
                    <option value="{{ $id }}" {{ collect(old('curso_ids', []))->contains($id) ? 'selected' : '' }}>
                        {{ $titulo }}
                    </option>
                @endforeach
            </select>
            @error('curso_ids')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            @error('curso_ids.*')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Matricular</button>
    </form>
@endsection
