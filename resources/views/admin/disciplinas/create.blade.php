@extends('layouts.app')

@section('title', 'Nova Disciplina')

@section('content')
    <h1>Nova disciplina</h1>

    <form method="POST" action="{{ route('admin.disciplinas.store') }}" class="col-lg-6">
        @csrf
        @include('admin.disciplinas._form')
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
