@extends('layouts.app')

@section('title', 'Detalhes do Curso')

@section('content')
    <h1>{{ $curso->titulo }}</h1>

    <p>{{ $curso->descricao }}</p>

    <ul>
        <li>Data início: {{ optional($curso->data_inicio)->format('d/m/Y') }}</li>
        <li>Data fim: {{ optional($curso->data_fim)->format('d/m/Y') }}</li>
    </ul>

    <a href="{{ route('admin.cursos.edit', $curso) }}">Editar</a>
    <a href="{{ route('admin.cursos.index') }}">Voltar</a>
@endsection
