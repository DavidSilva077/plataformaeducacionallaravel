@extends('layouts.app')

@section('title', 'Novo Professor')

@section('content')
    <h1>Novo professor</h1>

    <form method="POST" action="{{ route('admin.professores.store') }}">
        @csrf
        @include('admin.professores._form')
        <button type="submit">Salvar</button>
    </form>
@endsection
