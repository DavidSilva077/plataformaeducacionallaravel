<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app">
        <nav>
            <a href="{{ url('/') }}">{{ config('app.name') }}</a>
            <div>
                @php
                    $activeGuard = null;
                    if (Auth::guard('admin')->check()) {
                        $activeGuard = 'admin';
                    } elseif (Auth::guard('aluno')->check()) {
                        $activeGuard = 'aluno';
                    } elseif (Auth::guard('web')->check()) {
                        $activeGuard = 'web';
                    }
                    $authenticatedUser = $activeGuard ? Auth::guard($activeGuard)->user() : null;
                @endphp

                @if ($authenticatedUser)
                    <span>{{ $authenticatedUser->name }}</span>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sair
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Cadastro</a>
                @endif
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
