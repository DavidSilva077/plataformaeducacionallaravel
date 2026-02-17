@extends('layouts.app')

@section('title', 'Detalhes do Aluno')

@section('content')
    <h1>{{ $aluno->nome }}</h1>

    <p>{{ $aluno->email }}</p>

    <p>Data de nascimento: {{ optional($aluno->data_nascimento)->format('d/m/Y') }}</p>

    <a href="{{ route('admin.alunos.edit', $aluno) }}">Editar</a>
    <a href="{{ route('admin.alunos.index') }}">Voltar</a>
@endsection
