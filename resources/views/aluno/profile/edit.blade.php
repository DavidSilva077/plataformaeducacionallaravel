@extends('layouts.app')

@section('title', 'Meu Perfil')

@section('content')
    <h1>Meu perfil</h1>

    <form method="POST" action="{{ route('aluno.profile.update') }}" class="col-lg-6">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input id="nome" type="text" name="nome" value="{{ old('nome', $aluno->nome) }}" required class="form-control">
            @error('nome')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email', $aluno->email) }}" required class="form-control">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de nascimento</label>
            <input id="data_nascimento" type="date" name="data_nascimento" value="{{ old('data_nascimento', optional($aluno->data_nascimento)->format('Y-m-d')) }}" class="form-control">
            @error('data_nascimento')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection
