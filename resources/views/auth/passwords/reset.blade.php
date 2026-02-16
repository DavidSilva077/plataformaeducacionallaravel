@extends('layouts.app')

@section('title', 'Redefinir Senha')

@section('content')
    <h1>Redefinir senha</h1>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div>
            <label for="email">E-mail</label>
            <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus>
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password">Senha</label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password-confirm">Confirmar senha</label>
            <input id="password-confirm" type="password" name="password_confirmation" required>
        </div>

        <button type="submit">Redefinir senha</button>
    </form>
@endsection
