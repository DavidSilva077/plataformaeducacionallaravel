@extends('layouts.app')

@section('title', 'Editar Curso')

@section('content')
    <h1>Editar curso</h1>

    <form method="POST" action="{{ route('admin.cursos.update', $curso) }}">
        @csrf
        @method('PUT')
        @include('admin.cursos._form')
        <button type="submit">Atualizar</button>
    </form>
@endsection
