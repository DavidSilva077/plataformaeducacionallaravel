@extends('layouts.app')

@section('title', 'Redefinir Senha')

@section('content')
    <h1>Redefinir senha</h1>

    <form method="POST" action="{{ route('password.update') }}" class="col-lg-6">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus class="form-control">
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

        <div class="mb-3">
            <label for="password-confirm" class="form-label">Confirmar senha</label>
            <input id="password-confirm" type="password" name="password_confirmation" required class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Redefinir senha</button>
    </form>
@endsection
