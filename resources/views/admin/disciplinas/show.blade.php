@extends('layouts.app')

@section('title', 'Detalhes da Disciplina')

@section('content')
    <h1>{{ $disciplina->titulo }}</h1>

    <p>{{ $disciplina->descricao }}</p>

    <ul class="list-unstyled">
        <li>Curso: {{ optional($disciplina->curso)->titulo }}</li>
        <li>Professor: {{ optional($disciplina->professor)->nome }}</li>
    </ul>

    <a href="{{ route('admin.disciplinas.edit', $disciplina) }}" class="btn btn-outline-primary">Editar</a>
    <a href="{{ route('admin.disciplinas.index') }}" class="btn btn-link">Voltar</a>
@endsection
