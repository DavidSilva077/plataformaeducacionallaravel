<?php

namespace Tests\Feature;

use App\Models\Aluno;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AlunoProfileUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function testAlunoPodeAtualizarPerfil()
    {
        $this->withoutMiddleware(VerifyCsrfToken::class);

        $aluno = Aluno::create([
            'nome' => 'Aluno Original',
            'email' => 'aluno.original@teste.com',
            'data_nascimento' => '2000-01-01',
            'password' => Hash::make('123456'),
        ]);

        $response = $this->actingAs($aluno, 'aluno')
            ->put(route('aluno.profile.update'), [
                'nome' => 'Aluno Atualizado',
                'email' => 'aluno.atualizado@teste.com',
                'data_nascimento' => '1999-12-31',
            ]);

        $response->assertRedirect(route('aluno.profile.edit'));
        $this->assertDatabaseHas('alunos', [
            'id' => $aluno->id,
            'nome' => 'Aluno Atualizado',
            'email' => 'aluno.atualizado@teste.com',
            'data_nascimento' => '1999-12-31',
        ]);
    }
}
