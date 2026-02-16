<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AlunoAuthenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        return parent::handle($request, $next, 'aluno');
    }

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('aluno.login');
        }
    }
}
