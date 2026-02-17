@extends('layouts.app')

@section('title', 'Editar Professor')

@section('content')
    <h1>Editar professor</h1>

    <form method="POST" action="{{ route('admin.professores.update', $professor) }}" class="col-lg-6">
        @csrf
        @method('PUT')
        @include('admin.professores._form')
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection
