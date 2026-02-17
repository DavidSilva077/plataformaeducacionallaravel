@extends('layouts.app')

@section('title', 'Novo Curso')

@section('content')
    <h1>Novo curso</h1>

    <form method="POST" action="{{ route('admin.cursos.store') }}" class="col-lg-6">
        @csrf
        @include('admin.cursos._form')
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
