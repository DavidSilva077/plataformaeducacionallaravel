<?php

use App\Models\Aluno;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AlunoSeeder extends Seeder
{
    public function run()
    {
        Aluno::updateOrCreate(
            ['email' => 'aluno@teste.com'],
            [
                'nome' => 'Aluno Teste',
                'data_nascimento' => '2000-01-01',
                'password' => Hash::make('123456'),
            ]
        );
    }
}
