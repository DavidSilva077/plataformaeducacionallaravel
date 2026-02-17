@extends('layouts.app')

@section('title', 'Novo Aluno')

@section('content')
    <h1>Novo aluno</h1>

    <form method="POST" action="{{ route('admin.alunos.store') }}">
        @csrf
        @include('admin.alunos._form')
        <button type="submit">Salvar</button>
    </form>
@endsection
