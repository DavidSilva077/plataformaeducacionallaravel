@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <h1>Área Administrativa</h1>

    <div class="d-flex flex-wrap gap-2">
        <a class="btn btn-outline-primary" href="{{ route('admin.cursos.index') }}">Cursos</a>
        <a class="btn btn-outline-primary" href="{{ route('admin.professores.index') }}">Professores</a>
        <a class="btn btn-outline-primary" href="{{ route('admin.disciplinas.index') }}">Disciplinas</a>
        <a class="btn btn-outline-primary" href="{{ route('admin.alunos.index') }}">Alunos</a>
        <a class="btn btn-outline-primary" href="{{ route('admin.matriculas.index') }}">Matrículas</a>
        <a class="btn btn-outline-primary" href="{{ route('admin.relatorios.professor-jubilut') }}">Relatório Jubilut</a>
    </div>
@endsection
