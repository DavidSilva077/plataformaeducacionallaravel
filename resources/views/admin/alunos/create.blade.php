@extends('layouts.app')

@section('title', 'Novo Aluno')

@section('content')
    <h1>Novo aluno</h1>

    <form method="POST" action="{{ route('admin.alunos.store') }}" class="col-lg-6">
        @csrf
        @include('admin.alunos._form')
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
