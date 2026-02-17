@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
    <h1>Login Administrador</h1>

    <form method="POST" action="{{ route('admin.login.submit') }}" class="col-lg-5">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input id="password" type="password" name="password" required class="form-control">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember_admin" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember_admin">Lembrar-me</label>
        </div>

        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
@endsection
