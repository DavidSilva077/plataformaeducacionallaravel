@extends('layouts.app')

@section('title', 'Detalhes do Curso')

@section('content')
    <h1>{{ $curso->titulo }}</h1>

    <p>{{ $curso->descricao }}</p>

    <ul class="list-unstyled">
        <li>Data início: {{ optional($curso->data_inicio)->format('d/m/Y') }}</li>
        <li>Data fim: {{ optional($curso->data_fim)->format('d/m/Y') }}</li>
    </ul>

    <a href="{{ route('admin.cursos.edit', $curso) }}" class="btn btn-outline-primary">Editar</a>
    <a href="{{ route('admin.cursos.index') }}" class="btn btn-link">Voltar</a>
@endsection
