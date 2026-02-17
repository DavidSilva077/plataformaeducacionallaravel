@extends('layouts.app')

@section('title', 'Novo Professor')

@section('content')
    <h1>Novo professor</h1>

    <form method="POST" action="{{ route('admin.professores.store') }}" class="col-lg-6">
        @csrf
        @include('admin.professores._form')
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
