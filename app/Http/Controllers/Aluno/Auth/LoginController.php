<?php

namespace App\Http\Controllers\Aluno\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/aluno/dashboard';

    public function __construct()
    {
        $this->middleware('guest:aluno')->except('logout');
    }

    public function showLoginForm()
    {
        return view('aluno.auth.login');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('aluno.login');
    }

    protected function guard()
    {
        return Auth::guard('aluno');
    }
}
