@extends('layouts.app')

@section('title', 'Verificação')

@section('content')
    <h1>Verificação de e-mail</h1>

    @if (session('resent'))
        <div>Um novo link de verificação foi enviado.</div>
    @endif

    <p>Antes de continuar, verifique o seu e-mail.</p>
    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit">Reenviar link</button>
    </form>
@endsection
