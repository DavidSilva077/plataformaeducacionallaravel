@extends('layouts.app')

@section('title', 'Dashboard Aluno')

@section('content')
    <h1>Área do Aluno</h1>

    <a href="{{ route('aluno.profile.edit') }}" class="btn btn-primary">Editar meus dados</a>
@endsection
