@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
    <h1>Login Administrador</h1>

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <div>
            <label for="email">E-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
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
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                Lembrar-me
            </label>
        </div>

        <button type="submit">Entrar</button>
    </form>
@endsection
