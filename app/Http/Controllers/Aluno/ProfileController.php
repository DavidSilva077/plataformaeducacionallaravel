<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use App\Http\Requests\Aluno\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $aluno = Auth::guard('aluno')->user();

        return view('aluno.profile.edit', compact('aluno'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $aluno = Auth::guard('aluno')->user();
        $aluno->update($request->validated());

        return redirect()->route('aluno.profile.edit');
    }
}
