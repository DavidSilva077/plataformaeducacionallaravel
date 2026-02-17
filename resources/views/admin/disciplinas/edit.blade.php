@extends('layouts.app')

@section('title', 'Editar Disciplina')

@section('content')
    <h1>Editar disciplina</h1>

    <form method="POST" action="{{ route('admin.disciplinas.update', $disciplina) }}">
        @csrf
        @method('PUT')
        @include('admin.disciplinas._form')
        <button type="submit">Atualizar</button>
    </form>
@endsection
