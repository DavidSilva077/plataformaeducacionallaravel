@extends('layouts.app')

@section('title', 'Dashboard Aluno')

@section('content')
    <h1>Área do Aluno</h1>

    <a href="{{ route('aluno.profile.edit') }}">Editar meus dados</a>
@endsection
