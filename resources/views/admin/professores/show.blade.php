@extends('layouts.app')

@section('title', 'Detalhes do Professor')

@section('content')
    <h1>{{ $professor->nome }}</h1>

    <p>{{ $professor->email }}</p>

    <a href="{{ route('admin.professores.edit', $professor) }}" class="btn btn-outline-primary">Editar</a>
    <a href="{{ route('admin.professores.index') }}" class="btn btn-link">Voltar</a>
@endsection
