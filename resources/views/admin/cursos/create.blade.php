@extends('layouts.app')

@section('title', 'Novo Curso')

@section('content')
    <h1>Novo curso</h1>

    <form method="POST" action="{{ route('admin.cursos.store') }}">
        @csrf
        @include('admin.cursos._form')
        <button type="submit">Salvar</button>
    </form>
@endsection
