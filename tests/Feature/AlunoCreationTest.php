<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Aluno;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlunoCreationTest extends TestCase
{
    use RefreshDatabase;

    public function testItCreatesAluno()
    {
        $aluno = factory(Aluno::class)->create([
            'nome' => 'Ana Silva',
            'email' => 'ana@example.com',
        ]);

        $this->assertDatabaseHas('alunos', [
            'id' => $aluno->id,
            'nome' => 'Ana Silva',
            'email' => 'ana@example.com',
        ]);
    }
}
