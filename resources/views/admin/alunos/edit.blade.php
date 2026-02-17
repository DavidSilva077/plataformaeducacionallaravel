@extends('layouts.app')

@section('title', 'Editar Aluno')

@section('content')
    <h1>Editar aluno</h1>

    <form method="POST" action="{{ route('admin.alunos.update', $aluno) }}" class="col-lg-6">
        @csrf
        @method('PUT')
        @include('admin.alunos._form')
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection
