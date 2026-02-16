@extends('layouts.app')

@section('title', 'Recuperar Senha')

@section('content')
    <h1>Recuperar senha</h1>

    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <label for="email">E-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Enviar link</button>
    </form>
@endsection
