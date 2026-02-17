<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Aluno;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AlunoFilterTest extends TestCase
{
    use RefreshDatabase;

    public function testFiltraAlunosPorNome()
    {
        $admin = Admin::create([
            'name' => 'Admin Teste',
            'email' => 'admin-filtro-nome@teste.com',
            'password' => Hash::make('123456'),
        ]);

        factory(Aluno::class)->create([
            'nome' => 'Ana Souza',
            'email' => 'ana@teste.com',
        ]);
        factory(Aluno::class)->create([
            'nome' => 'Bruno Lima',
            'email' => 'bruno@teste.com',
        ]);

        $response = $this->actingAs($admin, 'admin')
            ->get(route('admin.alunos.index', ['nome' => 'Ana']));

        $response->assertOk();
        $response->assertViewHas('alunos', function ($alunos) {
            return $alunos->total() === 1
                && $alunos->items()[0]->nome === 'Ana Souza';
        });
    }

    public function testFiltraAlunosPorEmail()
    {
        $admin = Admin::create([
            'name' => 'Admin Teste 2',
            'email' => 'admin-filtro-email@teste.com',
            'password' => Hash::make('123456'),
        ]);

        factory(Aluno::class)->create([
            'nome' => 'Carlos Santos',
            'email' => 'carlos@teste.com',
        ]);
        factory(Aluno::class)->create([
            'nome' => 'Diana Costa',
            'email' => 'diana@teste.com',
        ]);

        $response = $this->actingAs($admin, 'admin')
            ->get(route('admin.alunos.index', ['email' => 'diana@teste.com']));

        $response->assertOk();
        $response->assertViewHas('alunos', function ($alunos) {
            return $alunos->total() === 1
                && $alunos->items()[0]->email === 'diana@teste.com';
        });
    }
}
