@extends('layouts.app')

@section('title', 'Nova Disciplina')

@section('content')
    <h1>Nova disciplina</h1>

    <form method="POST" action="{{ route('admin.disciplinas.store') }}">
        @csrf
        @include('admin.disciplinas._form')
        <button type="submit">Salvar</button>
    </form>
@endsection
